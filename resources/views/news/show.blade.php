@extends('layouts.sfc')
@section('title', $news->title)

@section('content')
<section class="small-section bg-dark-alfa-50 bg-scroll light-content"
    data-background="{{ $imageUrl ?: asset('sfc/images/mainbg.png') }}" id="home">
    <div class="container relative pt-70">
        <div class="row">
            <div class="col-md-8">
                <h1 class="hs-line-7 mb-40 mb-xs-20">{{ $news->title }}</h1>
                <div class="blog-item-data">
                    <span><i class="fa fa-clock"></i>
                        {{ optional($news->published_at ?? $news->created_at)->format('d M Y') }}
                    </span>
                </div>
            </div>
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs text-end">
                    <a href="{{ route('home') }}">الرئيسية</a>
                    <span class="mod-breadcrumbs-slash">•</span>
                    <a href="{{ route('news.index') }}">الأخبار</a>
                    <span class="mod-breadcrumbs-slash">•</span>
                    <span>تفاصيل الخبر</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container relative">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-sm-80">
                @if($imageUrl)
                <div class="blog-media mt-0 mb-30 text-center">
                    <img src="{{ $imageUrl }}"
                        alt="{{ $news->title }}"
                        style="max-width:850px; width:100%; height:auto; display:block; margin:0 auto; border-radius:8px; box-shadow:0 2px 12px rgba(0,0,0,.15);">
                </div>
                @endif
                <div class="blog-item mb-80 mb-xs-40">
                    <div class="blog-item-body">
                        @if($news->excerpt)
                        <div class="lead mt-0">
                            <p>{{ $news->excerpt }}</p>
                        </div>
                        @endif
                        <div class="mt-20">
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>

                <div class="clearfix mt-40">
                    @if($prev)
                    <a href="{{ route('news.show', $prev->slug ?? $prev->id) }}" class="blog-item-more left">
                        <i class="fa fa-chevron-left"></i>&nbsp;الخبر السابق
                    </a>
                    @endif
                    @if($next)
                    <a href="{{ route('news.show', $next->slug ?? $next->id) }}" class="blog-item-more right">
                        الخبر التالي&nbsp;<i class="fa fa-chevron-right"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection