@extends('layouts.admin')

@section('title', 'Manajemen Berita - Admin Panel')
@section('header_title', 'Manajemen Berita')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between bg-white py-3">
            <h6 class="fw-bold mb-0">Daftar Artikel</h6>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i> Tambah Baru
            </a>
        </div>
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table-hover mb-0 table align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 py-3 ps-4" style="width: 50px;">No</th>
                            <th class="border-0 py-3">Gambar</th>
                            <th class="border-0 py-3">Judul</th>
                            <th class="border-0 py-3">Tanggal Publish</th>
                            <th class="border-0 py-3 pe-4 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td class="ps-4">
                                    {{ $loop->iteration + ($articles->currentPage() - 1) * $articles->perPage() }}</td>
                                <td>
                                    @if ($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="Thumbnail" class="rounded"
                                            width="60" height="40" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center text-muted rounded"
                                            style="width: 60px; height: 40px;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $article->title }}</div>
                                    <div class="small text-muted text-truncate" style="max-width: 300px;">
                                        {{ $article->excerpt }}</div>
                                </td>
                                <td>
                                    @if ($article->published_at)
                                        <span class="badge bg-success-subtle text-success">
                                            {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary">Draft</span>
                                    @endif
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}"
                                        class="btn btn-sm btn-light text-primary me-1"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light text-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-muted py-5 text-center">
                                    <i class="fas fa-newspaper fs-1 d-block mb-3"></i>
                                    Belum ada artikel berita.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer border-0 bg-white py-3">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
