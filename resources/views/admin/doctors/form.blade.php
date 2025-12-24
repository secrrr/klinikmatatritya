@extends('admin.layout')
@section('content')
<h4>{{ $item->exists ? 'Edit' : 'Create' }} Doctor</h4>
<form method="post" enctype="multipart/form-data" action="{{ $item->exists ? route('admin.doctors.update',$item->id) : route('admin.doctors.store') }}">@csrf @if($item->exists) @method('PUT') @endif
<input name="name" class="form-control mb-2" value="{{ old('name',$item->name) }}" placeholder="Name">
<input name="specialty" class="form-control mb-2" value="{{ old('specialty',$item->specialty) }}" placeholder="Specialty">
<textarea name="bio" class="form-control mb-2">{{ old('bio',$item->bio) }}</textarea>
<input type="file" name="photo" class="form-control mb-2">
<button class="btn btn-primary">Save</button></form>
@endsection
