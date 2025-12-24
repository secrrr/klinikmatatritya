@extends('layouts.admin')

@section('title', 'Social Feeds')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Social Feeds (Instagram)</h1>
        <a href="{{ route('admin.social-feeds.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Feed
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Embed Preview</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($feeds as $feed)
                        <tr>
                            <td>
                                <div style="max-width: 300px; max-height: 200px; overflow: hidden;">
                                    {{ Str::limit($feed->embed_code, 100) }}
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.social-feeds.edit', $feed->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.social-feeds.destroy', $feed->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">No social feeds found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $feeds->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
