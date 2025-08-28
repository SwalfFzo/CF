@extends('layouts.admin') {{-- أو أي layout تستخدمه --}}

@section('content')
<div class="container">
    <h2 class="mb-4">إعدادات البريد الإلكتروني</h2>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form action="{{ route('admin.mail.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>MS TENANT</label>
            <input type="text" name="ms_tenant" class="form-control" value="{{ old('ms_tenant', $settings->ms_tenant) }}" required>
        </div>

        <div class="mb-3">
            <label>MS CLIENT ID</label>
            <input type="text" name="ms_client_id" class="form-control" value="{{ old('ms_client_id', $settings->ms_client_id) }}" required>
        </div>

        <div class="mb-3">
            <label>MS CLIENT SECRET</label>
            <input type="text" name="ms_client_secret" class="form-control" value="{{ old('ms_client_secret', $settings->ms_client_secret) }}" required>
        </div>

        <div class="mb-3">
            <label>MS REDIRECT URI</label>
            <input type="url" name="ms_redirect_uri" class="form-control" value="{{ old('ms_redirect_uri', $settings->ms_redirect_uri) }}" required>
        </div>

        <div class="mb-3">
            <label>البريد المرسل منه (GRAPH_FROM)</label>
            <input type="email" name="graph_from" class="form-control" value="{{ old('graph_from', $settings->graph_from) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
    </form>

    <hr class="my-5">

    <h4>اختبار الإرسال</h4>
    <form action="{{ route('admin.mail.test') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>البريد الذي تريد الإرسال إليه</label>
            <input type="email" name="to" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">إرسال تجريبي</button>
    </form>
</div>
@endsection