<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first();
        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = Hero::first();

        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'button_text' => 'nullable',
            'button_link' => 'nullable',
            'background' => 'nullable|image|mimes:jpg,png,webp'
        ]);

        if ($request->hasFile('background')) {
            $data['background'] = $request->file('background')
                ->store('hero', 'public');
        }

        $hero->update($data);

        return back()->with('success', 'Hero berhasil diupdate');
    }
}

