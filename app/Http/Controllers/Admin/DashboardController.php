<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        // آخر 3 أخبار بغضّ النظر عن التاريخ)
        // لو تبي فقط المنشور استخدم ->where('status','Published')
        $latest = News::orderByDesc('id')
            ->take(3)
            ->get(['id', 'title', 'excerpt', 'image', 'published_at']);

        // مهم: نرجّع welcome.blade.php ومعه المتغيّر
        return view('welcome', compact('latest'));
    }
}
