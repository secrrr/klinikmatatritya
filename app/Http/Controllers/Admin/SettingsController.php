<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function logo()
    {
        $logo = Settings::where('key', 'site_logo')->first();
        return view('admin.settings.logo', compact('logo'));
    }

     public function analytics()
    {
        return view('admin.analytics.index');
    }

    public function updateLogo(Request $request)
    {
        $request->validate(['logo' => 'required|image|max:2048']);
        $path = $request->file('logo')->store('public/logo');

        Settings::updateOrCreate(
            ['key' => 'site_logo'],
            ['value' => str_replace('public/', 'storage/', $path)]
        );

        return back()->with('success', 'Logo berhasil diperbarui!');
    }

    public function social()
    {
        $socials = Settings::whereIn('key', ['instagram', 'youtube', 'facebook', 'tiktok'])->get()->pluck('value', 'key');
        return view('admin.settings.social', compact('socials'));
    }

    public function updateSocial(Request $request)
    {
        foreach (['instagram', 'youtube', 'facebook', 'tiktok'] as $key) {
            Settings::updateOrCreate(['key' => $key], ['value' => $request->$key]);
        }

        return back()->with('success', 'Social links updated!');
    }

    public function mail()
    {
        $mail = Settings::whereIn('key', [
            'mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name'
        ])->get()->pluck('value', 'key');
        
        return view('admin.settings.mail', compact('mail'));
    }

    public function updateMail(Request $request)
    {
        $request->validate([
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'nullable',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required',
        ]);

        $keys = [
            'mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'mail_from_address', 'mail_from_name'
        ];

        foreach ($keys as $key) {
            Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $request->$key]
            );
        }

        return back()->with('success', 'Mail settings updated successfully!');
    }
}
