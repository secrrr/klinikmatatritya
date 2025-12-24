@extends('front.layout')
@section('content')
<h2>Artikel</h2>
<div class="row">
  @foreach($items as $a)
  <div class="col-md-4 mb-3"><div class="card"><div class="card-body"><h5><a href="{{ route('articles.show',$a->slug) }}">{{ $a->title }}</a></h5><p>{{ $a->excerpt }}</p></div></div></div>
  @endforeach
</div>
{{ $items->links() }}
@endsection
