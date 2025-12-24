@extends('front.layout')
@section('content')
<h2>{{ $service->title }}</h2>
@if($service->image)<img src="{{ asset('storage/'.$service->image) }}" class="img-fluid mb-3">@endif
{!! $service->content !!}
@endsection
