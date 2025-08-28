@extends('layouts.dashboard')
@section('title', $news->title)

@section('content')
<div class="card">
    <div class="card-body">
        <h2>{{ $news->title }}</h2>
        <p class="text-muted">{{ optional($news->published_at)->format('Y-m-d') }}</p>
        <p><strong>الملخص:</strong> {{ $news->summary }}</p>
        <div class="mt-3">{!! nl2br(e($news->body)) !!}</div>
        @if($news->cover_image_path)
        <div class="mt-3"><img src="{{ Storage::url($news->cover_image_path) }}" style="max-width: 400px"></div>
        @endif
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary mt-3">رجوع</a>
    </div>
</div>
@endsection