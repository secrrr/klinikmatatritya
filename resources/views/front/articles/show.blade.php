@extends('front.layout')
@section('content')
<h2>{{ $article->title }}</h2>
<p><small>{{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</small></p>
{!! $article->content !!}
@endsection
