@extends('front.layout')
@section('content')
<h2>Dokter Kami</h2>
@foreach($doctors as $d)
  <div class="mb-3">
    <h5>{{ $d->name }} <small>{{ $d->specialty }}</small></h5>
    <p>{{ $d->bio }}</p>
  </div>
@endforeach
@endsection
