// resources/js/admin.js

// 1) أساس Vite/Laravel (لو عندك bootstrap.js أبقه)
import './bootstrap';
import '@tabler/core/dist/css/tabler.rtl.min.css';
import '@tabler/icons-webfont/dist/tabler-icons.min.css';
import '@tabler/core/dist/js/tabler.min.js';
import 'quill/dist/quill.snow.css';
import Quill from 'quill';


import '../css/admin.css' // MyCss



// Theme toggle (light/dark) مع حفظ التفضيل
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('theme-toggle');
    const icon = document.getElementById('theme-toggle-icon');
    const root = document.documentElement; // <html>

    let theme = localStorage.getItem('theme') || 'light';
    apply();

    btn?.addEventListener('click', () => {
        theme = theme === 'dark' ? 'light' : 'dark';
        localStorage.setItem('theme', theme);
        apply();
    });

    function apply() {
        // يدعم Tabler كِلا: data-bs-theme="dark" أو class="theme-dark"
        if (theme === 'dark') {
            root.setAttribute('data-bs-theme', 'dark');
            document.body.classList.add('theme-dark');
            icon?.classList.remove('ti-moon'); icon?.classList.add('ti-sun');
            btn?.setAttribute('aria-label', 'الوضع الفاتح');
        } else {
            root.removeAttribute('data-bs-theme');
            document.body.classList.remove('theme-dark');
            icon?.classList.remove('ti-sun'); icon?.classList.add('ti-moon');
            btn?.setAttribute('aria-label', 'الوضع الداكن');
        }
    }
});
