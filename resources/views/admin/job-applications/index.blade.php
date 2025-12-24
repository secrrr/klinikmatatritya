@extends('layouts.admin')

@section('title', 'Lamaran Masuk - Admin Panel')
@section('header_title', 'Lamaran Masuk')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="mb-0 fw-bold">Daftar Pelamar</h6>
    </div>
    <div class="card-body p-0">
        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="border-0 py-3 ps-4" style="width: 50px;">No</th>
                        <th class="border-0 py-3">Nama Pelamar</th>
                        <th class="border-0 py-3">Posisi</th>
                        <th class="border-0 py-3">Kontak</th>
                        <th class="border-0 py-3">Tanggal</th>
                        <th class="border-0 py-3">Status</th>
                        <th class="border-0 py-3 pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration + ($applications->currentPage() - 1) * $applications->perPage() }}</td>
                        <td>
                            <div class="fw-bold text-dark">{{ $app->name }}</div>
                            <div class="small text-muted">{{ $app->location }}</div>
                        </td>
                        <td>
                            @if($app->career)
                                <span class="badge bg-primary-subtle text-primary">{{ $app->career->title }}</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary">Posisi Dihapus</span>
                            @endif
                        </td>
                        <td>
                            <div class="small text-dark">{{ $app->email }}</div>
                            <div class="small text-muted">{{ $app->phone }}</div>
                        </td>
                        <td>
                            <div class="text-muted small">{{ $app->created_at->format('d M Y, H:i') }}</div>
                        </td>
                        <td>
                            @if($app->status == 'pending')
                                <span class="badge bg-warning-subtle text-warning">Pending</span>
                            @elseif($app->status == 'reviewed')
                                <span class="badge bg-info-subtle text-info">Reviewed</span>
                            @elseif($app->status == 'rejected')
                                <span class="badge bg-danger-subtle text-danger">Rejected</span>
                            @elseif($app->status == 'accepted')
                                <span class="badge bg-success-subtle text-success">Accepted</span>
                            @endif
                        </td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('admin.job-applications.show', $app->id) }}" class="btn btn-sm btn-light text-primary me-1" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.job-applications.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus lamaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light text-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fs-1 mb-3 d-block"></i>
                            Belum ada lamaran masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $applications->links() }}
    </div>
</div>
@endsection
