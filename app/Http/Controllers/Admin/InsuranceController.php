<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = Insurance::latest()->paginate(10);
        return view('admin.insurances.index', compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insurances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'nullable|string|max:255',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('insurances', 'public');
        }

        Insurance::create($data);

        return redirect()->route('admin.insurances.index')->with('success', 'Insurance partner created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insurance $insurance)
    {
        return view('admin.insurances.edit', compact('insurance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Insurance $insurance)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'name' => 'nullable|string|max:255',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('logo')) {
            // Delete old logo
            if ($insurance->logo) {
                Storage::disk('public')->delete($insurance->logo);
            }
            $data['logo'] = $request->file('logo')->store('insurances', 'public');
        }

        $insurance->update($data);

        return redirect()->route('admin.insurances.index')->with('success', 'Insurance partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insurance $insurance)
    {
        if ($insurance->logo) {
            Storage::disk('public')->delete($insurance->logo);
        }
        $insurance->delete();

        return redirect()->route('admin.insurances.index')->with('success', 'Insurance partner deleted successfully.');
    }
}