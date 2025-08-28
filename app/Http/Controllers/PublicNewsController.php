<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Storage;

class PublicNewsController extends Controller
{
    // يُستدعى عبر /news/{news:slug}
    public function show(News $news)
    {
        $imageUrl = $news->image ? Storage::url($news->image) : null;

        // روابط السابق/التالي (اختياري)
        $prev = News::where('id', '<', $news->id)->orderByDesc('id')->first();
        $next = News::where('id', '>', $news->id)->orderBy('id')->first();

        return view('news.show', compact('news', 'imageUrl', 'prev', 'next'));
    }

    // Fallback بالـ id فقط: /news-id/{news}
    public function showById(News $news)
    {
        $imageUrl = $news->image ? Storage::url($news->image) : null;
        $prev = News::where('id', '<', $news->id)->orderByDesc('id')->first();
        $next = News::where('id', '>', $news->id)->orderBy('id')->first();

        return view('news.show', compact('news', 'imageUrl', 'prev', 'next'));
    }
}
