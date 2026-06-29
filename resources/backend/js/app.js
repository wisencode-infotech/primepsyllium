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

    const editorContainer = document.createElement('div');
    editorContainer.style.minHeight = '180px';
    mount.appendChild(editorContainer);

    const quill = new Quill(editorContainer, {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ align: [] }],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'],
                ['clean'],
            ],
        },
    });

    quill.root.innerHTML = hiddenInput.value;

    quill.on('text-change', () => {
        hiddenInput.value = quill.root.innerHTML;
        hiddenInput.dispatchEvent(new Event('input', { bubbles: true }));
    });
});
