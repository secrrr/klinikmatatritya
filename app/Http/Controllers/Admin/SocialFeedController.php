<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialFeed;
use Illuminate\Support\Facades\Storage;

class SocialFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feeds = SocialFeed::latest()->paginate(10);
        return view('admin.social-feeds.index', compact('feeds'));
    }

    public function create()
    {
        return view('admin.social-feeds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'embed_code' => 'required|string',
        ]);

        SocialFeed::create($request->all());

        return redirect()->route('admin.social-feeds.index')
            ->with('success', 'Social Feed created successfully.');
    }

    public function destroy(SocialFeed $socialFeed)
    {
        $socialFeed->delete();

        return redirect()->route('admin.social-feeds.index')
            ->with('success', 'Social Feed deleted successfully');
    }

    public function edit(SocialFeed $socialFeed)
    {
        return view('admin.social-feeds.edit', compact('socialFeed'));
    }

    public function update(Request $request, SocialFeed $socialFeed)
    {
        $request->validate([
            'embed_code' => 'required|string',
        ]);

        $socialFeed->update($request->all());

        return redirect()->route('admin.social-feeds.index')
            ->with('success', 'Social Feed updated successfully');
    }
}
