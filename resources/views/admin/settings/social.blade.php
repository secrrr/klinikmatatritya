@extends('admin.layout')

@section('content')
<h2>Social Media Links</h2>

<form method="POST" action="{{ route('admin.settings.social.update') }}">
    @csrf
    <div class="mb-3">
        <label>Instagram URL</label>
        <input type="text" name="instagram" class="form-control" value="{{ $socials['instagram'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label>YouTube URL</label>
        <input type="text" name="youtube" class="form-control" value="{{ $socials['youtube'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label>Facebook URL</label>
        <input type="text" name="facebook" class="form-control" value="{{ $socials['facebook'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label>TikTok URL</label>
        <input type="text" name="tiktok" class="form-control" value="{{ $socials['tiktok'] ?? '' }}">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
