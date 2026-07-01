import './bootstrap';
import '../../shared/js/theme';

import Alpine from 'alpinejs';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

// Use inline styles (not classes) for alignment so formatting survives outside
// the editor — e.g. in our live preview and in the actual sent email, neither
// of which load Quill's stylesheet that the ql-align-* classes depend on.
Quill.register(Quill.import('attributors/style/align'), true);

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('[data-quill]').forEach((mount) => {
    const hiddenInput = document.querySelector(mount.dataset.quill);
    if (!hiddenInput) return;

    const uploadUrl = mount.dataset.imageUploadUrl ?? null;

    const editorContainer = document.createElement('div');
    editorContainer.style.minHeight = '180px';
    mount.appendChild(editorContainer);

    const toolbarOptions = [
        ['bold', 'italic', 'underline'],
        [{ align: [] }],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['link'],
        ...(uploadUrl ? [['image']] : []),
        ['clean'],
    ];

    const quill = new Quill(editorContainer, {
        theme: 'snow',
        modules: {
            toolbar: {
                container: toolbarOptions,
                handlers: uploadUrl
                    ? {
                          image() {
                              const input = document.createElement('input');
                              input.type = 'file';
                              input.accept = 'image/jpeg,image/png,image/jpg,image/webp,image/gif';

                              input.onchange = async () => {
                                  const file = input.files[0];
                                  if (!file) return;

                                  const formData = new FormData();
                                  formData.append('image', file);

                                  const csrf = document
                                      .querySelector('meta[name="csrf-token"]')
                                      ?.getAttribute('content');

                                  try {
                                      const res = await fetch(uploadUrl, {
                                          method: 'POST',
                                          headers: { 'X-CSRF-TOKEN': csrf ?? '' },
                                          body: formData,
                                      });

                                      if (!res.ok) throw new Error('Upload failed');

                                      const { url } = await res.json();
                                      const range = quill.getSelection(true);
                                      quill.insertEmbed(range.index, 'image', url);
                                      quill.setSelection(range.index + 1);
                                  } catch {
                                      alert('Image upload failed. Please try again.');
                                  }
                              };

                              input.click();
                          },
                      }
                    : {},
            },
        },
    });

    quill.root.innerHTML = hiddenInput.value;

    quill.on('text-change', () => {
        hiddenInput.value = quill.root.innerHTML;
        hiddenInput.dispatchEvent(new Event('input', { bubbles: true }));
    });
});
