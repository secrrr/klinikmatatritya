@extends('front.layout')
@section('title','Layanan - Klinik Mata Tritya')
@section('content')
<h2>Semua Layanan</h2>
<div class="row">
  @foreach($items as $s)
  <div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <h5><a href="{{ route('services.show',$s->slug) }}">{{ $s->title }}</a></h5>
        <p>{{ $s->excerpt }}</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $items->links() }}
@endsection
