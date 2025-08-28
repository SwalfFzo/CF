@extends('layouts.dashboard')
@section('title','لوحة التحكم')

@section('content')
<div class="row row-cards">

    {{-- بطاقة ترحيب قصيرة --}}
    <div class="col-md-6 col-lg-4">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="avatar me-3 rounded" style="background-image:url('https://tabler.io/img/avatars/002m.jpg')"></span>
                <div>
                    <div class="font-weight-medium">مرحباً {{ auth()->user()->name ?? 'ضيف' }} 👋</div>
                    <div class="text-secondary">Tabler يعمل الآن بكامل المكوّنات</div>
                </div>
            </div>
        </div>
    </div>

    {{-- إجمالي الأخبار --}}
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <i class="ti ti-news me-2"></i>
                <div>
                    <div class="text-secondary">إجمالي الأخبار</div>
                    <div class="h2 m-0">{{ $stats['total_news'] ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- إجمالي الأخبار المنشورة --}}
    <div class="col-sm-6 col-lg-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <i class="ti ti-checks me-2"></i>
                <div>
                    <div class="text-secondary">المنشور</div>
                    <div class="h2 m-0">{{ $stats['published_news'] ?? 0 }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection