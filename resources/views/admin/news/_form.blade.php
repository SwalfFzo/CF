<div class="row g-3">
    {{-- العمود الأيسر: النصوص والمحتوى --}}
    <div class="col-md-8">
        {{-- العنوان --}}
        <div class="mb-3">
            <label class="form-label">العنوان</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control" required>
            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- الملخص --}}
        <div class="mb-3">
            <label class="form-label">الملخص</label>
            <textarea name="excerpt" class="form-control" rows="2">{{ old('excerpt', $news->excerpt) }}</textarea>
            @error('excerpt') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- المحتوى (Quill) --}}
        <div class="mb-3">
            <label class="form-label">المحتوى</label>
            <div id="editor" style="height: 260px; background: #fff;" class="border rounded">
                {!! old('content', $news->content) !!}
            </div>
            <input type="hidden" name="content" id="content-input" value="{{ old('content', $news->content) }}">
            @error('content') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
    </div>

    {{-- العمود الأيمن: الحالة، التاريخ، الصورة --}}
    <div class="col-md-4">
        {{-- الحالة --}}
        <div class="mb-3">
            <label class="form-label">الحالة</label>
            <select name="status" class="form-select">
                <option value="Draft" @selected(old('status', $news->status) == 'Draft')>مسودة</option>
                <option value="Published" @selected(old('status', $news->status) == 'Published')>منشور</option>
            </select>
            @error('status') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- تاريخ النشر --}}
        <div class="mb-3">
            <label class="form-label">تاريخ النشر</label>
            <input
                type="datetime-local"
                name="published_at"
                value="{{ old('published_at', optional($news->published_at)->format('Y-m-d\TH:i')) }}"
                class="form-control">
            @error('published_at') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        {{-- الصورة --}}
        <div class="mb-3">
            <label class="form-label">الصورة الرئيسية</label>
            <input type="file" name="image" id="image-input" class="form-control" accept="image/*">
            <div class="form-hint">يفضّل صورة أفقية. الحد الأقصى 2MB.</div>
            @error('image') <div class="text-danger small">{{ $message }}</div> @enderror

            {{-- معاينة الصورة الحالية أو الجديدة --}}
            <div class="mt-2">
                @if(!empty($news->image))
                <img id="image-preview" src="{{ asset('storage/'.$news->image) }}" alt="صورة الخبر"
                    class="img-thumbnail" style="max-height:150px">
                @else
                <img id="image-preview" src="#" alt="معاينة الصورة"
                    class="img-thumbnail d-none" style="max-height:150px">
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{-- Preview صورة --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('image-input');
        const preview = document.getElementById('image-preview');

        input?.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    preview.src = ev.target.result;
                    preview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.classList.add('d-none');
            }
        });
    });
</script>

{{-- Quill محرر --}}
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

        const hiddenInput = document.getElementById('content-input');
        // تحميل المحتوى السابق
        if (hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
        }

        // قبل الإرسال: اكتب المحتوى داخل input المخفي
        const form = hiddenInput.closest('form');
        form.addEventListener('submit', function() {
            hiddenInput.value = quill.root.innerHTML;
        });
    });
</script>
@endpush