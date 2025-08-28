<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsCrudController extends Controller
{
    public function index(Request $request)
    {
        $per = (int) $request->input('per_page', 10);
        $q   = $request->input('q');

        $items = News::when($q, function ($qq) use ($q) {
            $qq->where(function ($w) use ($q) {
                $w->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%");
            });
        })
            ->latest('published_at')
            ->paginate($per);

        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        // قيم افتراضية للإنشاء
        $news = new News([
            'status'       => 'Draft',
            'published_at' => now(),
        ]);

        return view('admin.news.create', compact('news'));
    }

    public function store(NewsRequest $request)
    {
        // التحقق يتم داخل NewsRequest
        $data = $request->validated();

        // رفع الصورة إن وُجدت
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public'); // storage/app/public/news
        }

        $news = News::create($data);

        return redirect()
            ->route('admin.news.edit', $news)
            ->with('status', 'تم إنشاء الخبر');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsRequest $request, News $news)
    {
        $data = $request->validated();

        // تبديل الصورة إن رُفعت جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة (اختياري/موصى به)
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return back()->with('status', 'تم التحديث');
    }

    public function destroy(News $news)
    {
        // حذف الصورة المخزنة (اختياري/موصى به)
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('status', 'تم حذف الخبر');
    }

    public function publish(News $news)
    {
        $news->update([
            'status'       => 'Published',
            'published_at' => now(),
        ]);

        return back()->with('status', 'تم النشر');
    }

    public function unpublish(News $news)
    {
        $news->update(['status' => 'Draft']);

        return back()->with('status', 'تم إلغاء النشر');
    }


    // Latest 3 posts for homepage section "آخر الأخبار"
    public function latestForHome()
    {
        // عدّل أسماء الحقول حسب جدولك لو كانت مختلفة
        $latest = \App\Models\News::query()
            ->where('status', 'Published')
            ->orderByDesc('published_at')
            ->take(3)
            ->get(['id', 'slug', 'title', 'excerpt', 'published_at', 'cover']); // غيّر 'cover' لو اسم عمود الصورة مختلف

        return view('public.partials.latest-news', compact('latest'));
    }
}
