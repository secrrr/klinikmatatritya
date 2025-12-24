@extends('layouts.admin')

@section('title', 'Add Social Feed')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Add Social Feed</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.social-feeds.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="embed_code" class="form-label">Instagram Embed Code (Paste the full &lt;blockquote&gt; code here)</label>
                    <textarea class="form-control @error('embed_code') is-invalid @enderror" id="embed_code" name="embed_code" rows="5" placeholder="<blockquote class='instagram-media' ...></blockquote>" required>{{ old('embed_code') }}</textarea>
                    @error('embed_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save Feed</button>
                <a href="{{ route('admin.social-feeds.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
