import './bootstrap';

import Alpine from 'alpinejs';
import '../css/app.css';

// ✅ Tabler: استيراد صحيح عبر الحزمة الرسمية
import '@tabler/core/dist/css/tabler.rtl.min.css'
import '@tabler/core/dist/js/tabler.min.js';
import '@tabler/icons-webfont/dist/tabler-icons.min.css';


window.Alpine = Alpine;
Alpine.start();
