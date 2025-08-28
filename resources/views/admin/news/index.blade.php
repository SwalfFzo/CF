@extends('layouts.dashboard')
@section('title','إدارة الأخبار')

@section('content')
<div class="card">
    {{-- Header: Show entries + زر إضافة + Search --}}
    <div class="card-header">
        <div class="row g-2 w-100 align-items-center">

            {{-- يسار: عرض عدد السجلات + زر إضافة خبر --}}
            <div class="col-md d-flex align-items-center gap-2">
                <form method="GET" class="d-flex align-items-center gap-2">
                    <span class="text-secondary">عرض</span>
                    <select name="per_page" class="form-select w-auto" onchange="this.form.submit()">
                        @php $per = (int) request('per_page', $items->perPage()); @endphp
                        @foreach([8,10,25,50,100] as $n)
                        <option value="{{ $n }}" @selected($per===$n)>{{ $n }}</option>
                        @endforeach
                    </select>
                    <span class="text-secondary">سجلات</span>
                    {{-- الحفاظ على قيمة البحث عند التغيير --}}
                    <input type="hidden" name="q" value="{{ request('q') }}">
                </form>

                <a href="{{ route('admin.news.create') }}" class="btn btn-primary ms-2">
                    <i class="ti ti-plus"></i> إضافة خبر
                </a>
            </div>

            {{-- يمين: البحث --}}
            <div class="col-md-auto ms-auto">
                <form method="GET" class="d-flex">
                    <div class="input-icon">
                        <span class="input-icon-addon"><i class="ti ti-search"></i></span>
                        <input type="text" name="q" class="form-control" placeholder="ابحث…" value="{{ request('q') }}">
                    </div>
                    <input type="hidden" name="per_page" value="{{ request('per_page', $items->perPage()) }}">
                </form>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-responsive table-unclip">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th class="w-1">
                        <input class="form-check-input m-0 align-middle" type="checkbox" id="check-all">
                    </th>
                    <th class="w-1">#</th>
                    <th>العنوان</th>
                    <th class="text-nowrap">الحالة</th>
                    <th class="text-nowrap">تاريخ النشر</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $n)
                @php $published = $n->status === 'Published'; @endphp
                <tr>
                    <td>
                        <input class="form-check-input m-0 align-middle" type="checkbox" value="{{ $n->id }}">
                    </td>
                    <td class="text-secondary">
                        {{ $loop->iteration + $items->firstItem() - 1 }}
                    </td>
                    <td class="text-reset">
                        <div class="fw-medium">{{ $n->title }}</div>
                        @if(!empty($n->excerpt))
                        <div class="text-secondary small">{{ \Illuminate\Support\Str::limit($n->excerpt, 60) }}</div>
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-{{ $published ? 'success' : 'secondary' }}-lt">
                            <span class="status-dot me-1 bg-{{ $published ? 'success' : 'secondary' }}"></span>
                            {{ $published ? 'منشور' : 'مسودة' }}
                        </span>
                    </td>
                    <td class="text-secondary">
                        {{ optional($n->published_at)->format('Y-m-d') }}
                    </td>
                    <td class="text-end w-1">
                        <div class="dropdown position-static">
                            <a href="#" class="btn btn-ghost-secondary btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('admin.news.edit',$n) }}" class="dropdown-item">
                                    <i class="ti ti-pencil me-1"></i> تعديل
                                </a>

                                @if($published)
                                <form action="{{ route('admin.news.unpublish',$n) }}" method="POST">@csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="ti ti-eye-off me-1"></i> إلغاء نشر
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('admin.news.publish',$n) }}" method="POST">@csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="ti ti-eye me-1"></i> نشر
                                    </button>
                                </form>
                                @endif

                                <div class="dropdown-divider"></div>
                                <form action="{{ route('admin.news.destroy',$n) }}" method="POST"
                                    onsubmit="return confirm('حذف الخبر؟')">
                                    @csrf @method('DELETE')
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="ti ti-trash me-1"></i> حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                    <div class="dropdown">
                        <button class="btn btn-ghost-secondary dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                            إجراءات
                        </button>

                    </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-secondary">لا توجد أخبار</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Footer: summary + pagination --}}
    <div class="card-footer d-flex align-items-center">
        <div class="text-secondary">
            إظهار {{ $items->firstItem() }} إلى {{ $items->lastItem() }} من أصل {{ $items->total() }} سجلات
        </div>
        <div class="ms-auto">
            {{ $items->withQueryString()->onEachSide(1)->links() }}
        </div>
    </div>
</div>

{{-- تحديد الكل --}}
@push('scripts')
<script>
    document.getElementById('check-all')?.addEventListener('change', (e) => {
        document.querySelectorAll('tbody input[type="checkbox"]').forEach(cb => cb.checked = e.target.checked);
    });
</script>
@endpush
@endsection