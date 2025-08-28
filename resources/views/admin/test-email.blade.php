@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h3>اختبار إرسال بريد إلكتروني</h3>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif

    <form method="POST" action="{{ route('admin.mail.test.send') }}">
        @csrf
        <div class="mb-3">
            <label for="to">البريد الإلكتروني المراد الإرسال إليه</label>
            <input type="email" class="form-control" name="to" id="to" required>
        </div>
        <button type="submit" class="btn btn-primary">إرسال الآن</button>
    </form>
</div>
@endsection