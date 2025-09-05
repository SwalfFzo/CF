@extends('layouts.app')
@section('title', 'لوحة المتدرب')
@section('content')

<div class="container-xl">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    لوحة المتدرب
                </h2>
                <div class="text-muted mt-1">مرحباً {{ Auth::user()->name }}، يمكنك من هنا إدارة دوراتك وحضورك</div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /><path d="M9 3v4a1 1 0 0 0 1 1h4" /><path d="M5 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /></svg>
                            تحميل الشهادة
                        </a>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        تسجيل حضور جديد
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row row-deck row-cards mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">الدورات المسجلة</div>
                    </div>
                    <div class="h1 mb-3">5</div>
                    <div class="d-flex mb-2">
                        <div>مكتملة: 3</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                60%
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">ساعات التدريب</div>
                    </div>
                    <div class="h1 mb-3">120</div>
                    <div class="d-flex mb-2">
                        <div>هذا الشهر: 45</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                +12%
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">نسبة الحضور</div>
                    </div>
                    <div class="h1 mb-3">95%</div>
                    <div class="d-flex mb-2">
                        <div>الجلسات: 20/21</div>
                        <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                +5%
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 17l6 -6l4 4l8 -8" /><path d="M14 7l7 0l0 7" /></svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="subheader">الشهادات</div>
                    </div>
                    <div class="h1 mb-3">3</div>
                    <div class="d-flex mb-2">
                        <div>متاحة للتحميل</div>
                        <div class="ms-auto">
                            <span class="text-blue d-inline-flex align-items-center lh-1">
                                جاهزة
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Tabs -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-courses" class="nav-link active" data-bs-toggle="tab" role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 13l-8 4.5l-8 -4.5l0 -13z" /><path d="M12 12l8 -4.5" /><path d="M12 12v9" /><path d="M12 12l-8 -4.5" /></svg>
                                الدورات التدريبية
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-attendance" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>
                                سجل الحضور
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-certificates" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /><path d="M9 3v4a1 1 0 0 0 1 1h4" /><path d="M5 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /></svg>
                                الشهادات
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-profile" class="nav-link" data-bs-toggle="tab" role="tab" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>
                                الملف الشخصي
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Courses Tab -->
                        <div class="tab-pane active show" id="tabs-courses" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-primary-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 13l-8 4.5l-8 -4.5l0 -13z" /><path d="M12 12l8 -4.5" /><path d="M12 12v9" /><path d="M12 12l-8 -4.5" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1"><a href="#">أساسيات البرمجة</a></h3>
                                            <div class="text-muted">مكتملة</div>
                                            <div class="mt-3">
                                                <span class="badge bg-success">100%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <a href="#" class="card-btn">عرض التفاصيل</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-warning-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 13l-8 4.5l-8 -4.5l0 -13z" /><path d="M12 12l8 -4.5" /><path d="M12 12v9" /><path d="M12 12l-8 -4.5" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1"><a href="#">تطوير الويب</a></h3>
                                            <div class="text-muted">قيد التقدم</div>
                                            <div class="mt-3">
                                                <span class="badge bg-warning">75%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <a href="#" class="card-btn">متابعة</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-info-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3l8 4.5l0 13l-8 4.5l-8 -4.5l0 -13z" /><path d="M12 12l8 -4.5" /><path d="M12 12v9" /><path d="M12 12l-8 -4.5" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1"><a href="#">قواعد البيانات</a></h3>
                                            <div class="text-muted">قيد التقدم</div>
                                            <div class="mt-3">
                                                <span class="badge bg-info">45%</span>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <a href="#" class="card-btn">متابعة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Attendance Tab -->
                        <div class="tab-pane" id="tabs-attendance" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th>التاريخ</th>
                                            <th>الدورة</th>
                                            <th>المدرب</th>
                                            <th>الحضور</th>
                                            <th>الملاحظات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2024-01-15</td>
                                            <td>أساسيات البرمجة</td>
                                            <td>أحمد محمد</td>
                                            <td><span class="badge bg-success">حاضر</span></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2024-01-12</td>
                                            <td>تطوير الويب</td>
                                            <td>فاطمة علي</td>
                                            <td><span class="badge bg-success">حاضر</span></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2024-01-10</td>
                                            <td>قواعد البيانات</td>
                                            <td>محمد أحمد</td>
                                            <td><span class="badge bg-danger">غائب</span></td>
                                            <td>عذر طبي</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Certificates Tab -->
                        <div class="tab-pane" id="tabs-certificates" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-success-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /><path d="M9 3v4a1 1 0 0 0 1 1h4" /><path d="M5 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1">أساسيات البرمجة</h3>
                                            <div class="text-muted">مكتملة</div>
                                            <div class="mt-3">
                                                <a href="#" class="btn btn-primary btn-sm">تحميل الشهادة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-success-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /><path d="M9 3v4a1 1 0 0 0 1 1h4" /><path d="M5 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1">أساسيات الحاسوب</h3>
                                            <div class="text-muted">مكتملة</div>
                                            <div class="mt-3">
                                                <a href="#" class="btn btn-primary btn-sm">تحميل الشهادة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card">
                                        <div class="card-body p-4 text-center">
                                            <span class="avatar avatar-xl mb-3 avatar-rounded bg-success-lt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /><path d="M9 3v4a1 1 0 0 0 1 1h4" /><path d="M5 21v-2a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2v2" /></svg>
                                            </span>
                                            <h3 class="m-0 mb-1">مهارات التواصل</h3>
                                            <div class="text-muted">مكتملة</div>
                                            <div class="mt-3">
                                                <a href="#" class="btn btn-primary btn-sm">تحميل الشهادة</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Tab -->
                        <div class="tab-pane" id="tabs-profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">المعلومات الشخصية</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">الاسم الكامل</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">البريد الإلكتروني</label>
                                                <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">تاريخ التسجيل</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->created_at->format('Y-m-d') }}" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">نوع الحساب</label>
                                                <input type="text" class="form-control" value="متدرب" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">إحصائيات التدريب</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">إجمالي الدورات</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="5" readonly>
                                                    <span class="input-group-text">دورة</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">إجمالي الساعات</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="120" readonly>
                                                    <span class="input-group-text">ساعة</span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">نسبة الإنجاز</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="60%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection