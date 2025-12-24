<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('doctors', 'public');
            $data['photo'] = $photoPath;
        }

        Doctor::create($data);

        return redirect()->route('admin.doctors.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($doctor->photo) {
                Storage::disk('public')->delete($doctor->photo);
            }
            $photoPath = $request->file('photo')->store('doctors', 'public');
            $data['photo'] = $photoPath;
        }

        $doctor->update($data);

        return redirect()->route('admin.doctors.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo) {
            Storage::disk('public')->delete($doctor->photo);
        }
        
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
