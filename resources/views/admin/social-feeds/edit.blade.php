@extends('layouts.admin')

@section('title', 'Edit Social Feed')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Social Feed</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.social-feeds.update', $socialFeed->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="embed_code" class="form-label">Instagram Embed Code</label>
                    <textarea class="form-control @error('embed_code') is-invalid @enderror" id="embed_code" name="embed_code" rows="5" required>{{ old('embed_code', $socialFeed->embed_code) }}</textarea>
                    @error('embed_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Feed</button>
                <a href="{{ route('admin.social-feeds.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
