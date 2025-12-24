@extends('admin.layout')

@section('content')
<h2>Update Logo</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Upload Logo Baru</label>
        <input type="file" name="logo" class="form-control" required>
    </div>

    @if($logo)
        <p>Logo Sekarang:</p>
        <img src="{{ asset($logo->value) }}" alt="Logo" style="max-width:150px;">
    @endif

    <button type="submit" class="btn btn-success">Update Logo</button>
</form>
@endsection
