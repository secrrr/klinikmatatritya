@extends('layouts.admin')

@section('title', 'Manajemen Kategori FAQ - Admin Panel')
@section('header_title', 'Manajemen Kategori FAQ')

@section('content')
    <a href="{{ route('admin.faqs.index') }}" class="btn btn-sm btn-primary mb-2">
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>
    <div class="card border-0 shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between bg-white py-3">
            <h6 class="fw-bold mb-0">Daftar Kategori FAQ</h6>
            <a href="{{ route('admin.faq-categories.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Baru
            </a>
        </div>
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table-hover mb-0 table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4" style="width: 50px;">No</th>
                            <th class="border-0 py-3">Nama Kategori</th>
                            <th class="border-0 py-3">Slug</th>
                            <th class="border-0 py-3 pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="ps-4">
                                    {{ $loop->iteration + ($categories->currentPage() - 1) * $categories->perPage() }}
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $category->name }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $category->slug }}</div>
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('admin.faq-categories.edit', $category->id) }}"
                                        class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.faq-categories.destroy', $category->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini? FAQ yang terkait akan kehilangan kategorinya.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-5 text-center">
                                    <i class="fas fa-folder-open fs-1 d-block mb-3"></i>
                                    Belum ada kategori FAQ.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($categories->hasPages())
                <div class="p-3">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
