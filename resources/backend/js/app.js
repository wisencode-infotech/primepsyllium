import './bootstrap';
import '../../shared/js/theme';

import Alpine from 'alpinejs';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

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
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'],
                ['clean'],
            ],
        },
    });

    quill.root.innerHTML = hiddenInput.value;

    quill.on('text-change', () => {
        hiddenInput.value = quill.root.innerHTML;
    });
});
