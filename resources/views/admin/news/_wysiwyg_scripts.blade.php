{{-- Quill via CDN (Snow theme) --}}
<link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        align: []
                    }],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    ['link', 'blockquote', 'code-block', 'image'],
                    ['clean']
                ]
            }
        });

        // لو فيه محتوى قديم نحطه داخل Quill
        const hiddenInput = document.getElementById('content-input');
        if (hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
        }

        // عند الإرسال: ننسخ قيمة Quill للـ hidden input
        const form = hiddenInput.closest('form');
        form.addEventListener('submit', function() {
            hiddenInput.value = quill.root.innerHTML;
        });
    });
</script>