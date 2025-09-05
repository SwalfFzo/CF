<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicNewsController;
use App\Models\News;
use App\Http\Controllers\MicrosoftOauthController;
use App\Http\Controllers\GraphMailTestController;
use App\Http\Controllers\MsGraphPoCController;
use App\Http\Controllers\MailSettingsController;
use App\Http\Controllers\TicketController;
/*
|--------------------------------------------------------------------------
| Public site
|--------------------------------------------------------------------------
*/

Route::get('/https-test', fn() => \Illuminate\Support\Facades\Http::get('https://graph.microsoft.com/v1.0')->status());

Route::get('/phpinfo', fn() => phpinfo());
// الصفحة الرئيسية (واحدة فقط) + تمرير آخر 3 أخبار
Route::get('/', function () {
    $latest = News::orderByDesc('id')->take(3)->get();
    return view('welcome', compact('latest'));
})->name('home');

// فهرس الأخبار (مؤقتًا صفحة بسيطة – غيّرها لاحقًا لعرض حقيقي)
Route::get('/news', function () {
    return view('news.index'); // أو مؤقتًا: return 'News index';
})->name('news.index');

// عرض خبر مفرد بالـ slug (Route Model Binding على حقل slug)
Route::get('/news/{news:slug}', [PublicNewsController::class, 'show'])
    ->name('news.show');

// (اختياري) عرض خبر مفرد بالـ id فقط كـ fallback
Route::get('/news-id/{news}', [PublicNewsController::class, 'showById'])
    ->name('news.show.id');


// Contact Us 
//Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/oauth/ms/redirect', [MsGraphPoCController::class, 'redirect']);
Route::get('/oauth/ms/callback', [MsGraphPoCController::class, 'callback']);

// مسار اختبار إرسال بريد عبر Graph
Route::get('/graph-mail/test', [GraphMailTestController::class, 'send']);


// Contact 
Route::post('/contact', [TicketController::class, 'store'])->name('contact.send');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/mail-settings', [MailSettingsController::class, 'edit'])->name('admin.mail-settings');
});


// Mail Settings Route 
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/mail-settings', [MailSettingsController::class, 'edit'])->name('admin.mail.edit');
    Route::put('/mail-settings', [MailSettingsController::class, 'update'])->name('admin.mail.update');
    Route::post('/mail-settings/test', [MailSettingsController::class, 'testSend'])->name('admin.mail.test');
});
/*
|--------------------------------------------------------------------------
| Authenticated areas
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // لوحة الإدارة
    Route::prefix('admin')
        ->name('admin.')
        ->middleware(['role:admin|event_manager|content_editor'])
        ->group(function () {

            // داشبورد الإدارة
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

            // CRUD الأخبار (admin + content_editor)
            Route::middleware(['role:content_editor|admin'])->group(function () {
                Route::get('/news', [\App\Http\Controllers\Admin\NewsCrudController::class, 'index'])->name('news.index');
                Route::get('/news/create', [\App\Http\Controllers\Admin\NewsCrudController::class, 'create'])->name('news.create');
                Route::post('/news', [\App\Http\Controllers\Admin\NewsCrudController::class, 'store'])->name('news.store');
                Route::get('/news/{news}/edit', [\App\Http\Controllers\Admin\NewsCrudController::class, 'edit'])->name('news.edit');
                Route::put('/news/{news}', [\App\Http\Controllers\Admin\NewsCrudController::class, 'update'])->name('news.update');
                Route::delete('/news/{news}', [\App\Http\Controllers\Admin\NewsCrudController::class, 'destroy'])->name('news.destroy');
                Route::post('/news/{news}/publish', [\App\Http\Controllers\Admin\NewsCrudController::class, 'publish'])->name('news.publish');
                Route::post('/news/{news}/unpublish', [\App\Http\Controllers\Admin\NewsCrudController::class, 'unpublish'])->name('news.unpublish');
            });
        });

    // لوحة المدرّب
    Route::prefix('trainer')->name('trainer.')->middleware(['role:trainer'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Trainer\DashboardController::class, 'index'])->name('dashboard');
    });

    // لوحة المتدرّب
    Route::prefix('trainee')->name('trainee.')->middleware(['role:trainee'])->group(function () {
        Route::get('/', [\App\Http\Controllers\Trainee\DashboardController::class, 'index'])->name('dashboard');
    });

    // الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// مسارات المصادقة (Breeze)
require __DIR__ . '/auth.php';
