import 'bootstrap';

window.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('textarea').forEach((el) => {
        el.setAttribute('spellcheck', 'false');
    });
});
