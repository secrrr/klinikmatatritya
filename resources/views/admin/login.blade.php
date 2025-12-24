@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3>Admin Login</h3>
    <form method="post" action="{{ route('admin.login.post') }}">@csrf
      <div class="mb-3"><input name="username" class="form-control" placeholder="Username"></div>
      <div class="mb-3"><input name="password" type="password" class="form-control" placeholder="Password"></div>
      <button class="btn btn-primary">Login</button>
    </form>
  </div>
</div>
@endsection
