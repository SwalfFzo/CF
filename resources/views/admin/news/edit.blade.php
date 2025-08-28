@extends('layouts.dashboard')
@section('title','تعديل خبر')

@section('content')
<div class="page-header mb-3">
    <h2 class="page-title">تعديل خبر: {{ $news->title }}</h2>
</div>

{{-- form رئيسية للتعديل --}}
<form class="card" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        {{-- الاستمارة الجزئية --}}
        @include('admin.news._form', ['news' => $news, 'mode' => 'edit'])

        {{-- عرض الصورة الحالية --}}
        @if($news->image)
        <div class="mb-3">
            <label class="form-label d-block">الصورة الحالية:</label>
            <img src="{{ asset('storage/'.$news->image) }}" class="img-thumbnail" width="200">
        </div>
        @endif
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('admin.news.index') }}" class="btn">رجوع</a>
        <div class="d-flex gap-2">
            {{-- الأزرار الخاصة بالحالة --}}
            @if($news->status === 'Published')
            <button class="btn btn-warning" type="submit"
                formaction="{{ route('admin.news.unpublish', $news) }}"
                formmethod="POST">@csrf إلغاء نشر</button>
            @else
            <button class="btn btn-success" type="submit"
                formaction="{{ route('admin.news.publish', $news) }}"
                formmethod="POST">@csrf نشر</button>
            @endif

            {{-- زر الحفظ --}}
            <button class="btn btn-primary" type="submit">حفظ</button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
@include('admin.news._wysiwyg_scripts')
@endpush