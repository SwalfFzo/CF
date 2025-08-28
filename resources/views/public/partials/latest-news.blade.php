@php
// اجلب آخر 3 أخبار بدون شروط
$latest = $latest ?? \App\Models\News::orderByDesc('id')->take(3)->get();
@endphp

<section class="page-section sfc-section" id="latest-news" style="background-color: #fff;">
    <div class="container relative">

        {{-- Debug مؤقت للتأكد (احذفه لاحقًا) --}}
        {{-- <pre style="direction:ltr;background:#111;color:#0f0;padding:8px;border-radius:6px;max-height:200px;overflow:auto;">
{{ print_r($latest?->toArray(), true) }}
        </pre> --}}

        <div class="text-center mb-80 mb-sm-50">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <h2 class="section-title colorFont">آخر الأخبار</h2>
                    <p class="section-title-descr">أحدث ما نُشر في أخبار المؤسسة</p>
                </div>
                <div class="col-sm-3 text-sm-end pt-30 pt-xs-0">
                    <a href="{{ route('news.index') }}" class="section-more">عرض الكل <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($latest as $news)
            <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50">

                @php
                $img = $news->image
                ? \Illuminate\Support\Facades\Storage::url($news->image)
                : asset('sfc/images/post-prev-1.jpg');
                @endphp

                <div class="post-prev-img">
                    <a href="{{ route('news.show', $news->id) }}" tabindex="-1">
                        <img src="{{ $img }}" alt="{{ $news->title }}" class="wow scaleOutIn" data-wow-duration="1.2s" />
                    </a>
                </div>

                <h3 class="post-prev-title colorFont">
                    <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                </h3>

                <div class="post-prev-info ">
                    {{ optional($news->published_at ?? $news->created_at)->format('d M Y') }}
                </div>

                <div class="post-prev-text colorFont">
                    {{ \Illuminate\Support\Str::limit(strip_tags($news->excerpt ?? ''), 150) }}
                </div>

                <div class="post-prev-more">
                    <a href="{{ route('news.show', $news->slug ?? $news->id) }}" class="text-link">اقرأ المزيد</a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">لا توجد أخبار حالياً.</div>
            @endforelse
        </div>

    </div>
</section>