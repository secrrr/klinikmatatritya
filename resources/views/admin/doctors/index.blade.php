@extends('layouts.admin')

@section('title', 'Manajemen Dokter - Admin Panel')
@section('header_title', 'Manajemen Dokter')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-bold">Daftar Dokter</h6>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Baru
        </a>
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
                        <th class="border-0 py-3">Foto</th>
                        <th class="border-0 py-3">Nama Dokter</th>
                        <th class="border-0 py-3">Spesialisasi</th>
                        <th class="border-0 py-3 pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($doctors as $doctor)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration + ($doctors->currentPage() - 1) * $doctors->perPage() }}</td>
                        <td>
                            @if($doctor->photo)
                                <img src="{{ asset('storage/' . $doctor->photo) }}" alt="Photo" class="rounded-circle" width="40" height="40" style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded-circle d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user-md"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $doctor->name }}</div>
                            <div class="small text-muted">{{ $doctor->phone ?? '-' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-info-subtle text-info text-dark">
                                {{ $doctor->specialty ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="pe-4 text-end">
                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light text-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-user-md fs-1 mb-3 d-block"></i>
                            Belum ada data dokter.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0 py-3">
        {{ $doctors->links() }}
    </div>
</div>
@endsection
