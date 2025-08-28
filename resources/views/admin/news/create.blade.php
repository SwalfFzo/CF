{{-- resources/views/admin/news/create.blade.php --}}
@extends('layouts.dashboard')
@section('title','إضافة خبر')

@section('content')
<div class="page-header mb-3">
    <h2 class="page-title">إضافة خبر</h2>
</div>

{{-- رسالة نجاح عامة (إن وُجدت) --}}
@if (session('status'))
<div class="alert alert-success mb-3">{{ session('status') }}</div>
@endif

{{-- ملخّص أخطاء التحقق (إن وُجدت) --}}
@if ($errors->any())
<div class="alert alert-danger mb-3">
    <div class="text-secondary mb-1">تأكد من البيانات المدخلة:</div>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form class="card" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        {{-- النموذج الموحّد: يحتوي (العنوان، الملخص، المحتوى WYSIWYG، الحالة، تاريخ النشر، الصورة) --}}
        @include('admin.news._form', ['news' => $news, 'mode' => 'create'])
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('admin.news.index') }}" class="btn">رجوع</a>
        <button class="btn btn-primary" type="submit">حفظ</button>
    </div>
</form>
@endsection

@push('scripts')
{{-- سكربتات محرر WYSIWYG (Quill) --}}
@include('admin.news._wysiwyg_scripts')
@endpush