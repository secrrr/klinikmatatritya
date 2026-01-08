@extends('layouts.admin')

@section('title', 'Edit Hero Section - Admin Panel')
@section('header_title', 'Edit Hero Section')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Judul Hero</label>
    <textarea name="title" class="form-control" rows="2">{{ $hero->title }}</textarea>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="description" class="form-control">{{ $hero->description }}</textarea>
</div>

<div class="mb-3">
    <label>Background Image</label>
    @if($hero->background)
    <div class="mb-2">
    <img src="{{ asset('storage/' . $hero->background) }}" alt="Current Image" class="rounded" width="150">
    </div>
    @endif
    <input type="file" name="background" class="form-control @error('background') is-invalid @enderror" accept="image/*">
    <div class="form-text small">Biarkan kosong jika tidak ingin mengubah gambar.</div>
    @error('background')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror

<div class="mb-3">
    <label>Teks Tombol</label>
    <input type="text" name="button_text" value="{{ $hero->button_text }}" class="form-control">
</div>

<div class="mb-3">
    <label>Link Tombol</label>
    <input type="text" name="button_link" value="{{ $hero->button_link }}" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
</form>

@endsection
