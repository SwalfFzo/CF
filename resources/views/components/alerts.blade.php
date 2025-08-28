{{-- رسائل الحالة/الأخطاء بأسلوب Tabler --}}
@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    <div class="d-flex">
        <div><i class="ti ti-checks me-2"></i></div>
        <div>
            <h4 class="alert-title mb-1">تم التنفيذ</h4>
            <div class="text-secondary">{{ session('status') }}</div>
        </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
    <div class="d-flex">
        <div><i class="ti ti-alert-circle me-2"></i></div>
        <div>
            <h4 class="alert-title mb-1">لم يتم الحفظ</h4>
            <div class="text-secondary">نرجو تصحيح الأخطاء التالية:</div>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <a class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
</div>
@endif