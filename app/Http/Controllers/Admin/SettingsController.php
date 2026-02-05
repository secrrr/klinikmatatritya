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
    public function general()
    {
        $settings = Settings::whereIn('key', ['maintenance_mode', 'office_name', 'office_address', 'office_phone', 'office_wa', 'office_email', 'eye_anatomy_image', 'booking_link', 'help_menu_roles', 'help_menu_needs'])->pluck('value', 'key');
        
        $maintenance_mode = $settings['maintenance_mode'] ?? 'false';
        $office_name = $settings['office_name'] ?? 'Klinik Mata Tritya';
        $office_address = $settings['office_address'] ?? '';
        $office_phone = $settings['office_phone'] ?? '';
        $office_wa = $settings['office_wa'] ?? '';
        $office_email = $settings['office_email'] ?? '';
        $eye_anatomy_image = $settings['eye_anatomy_image'] ?? '';
        $booking_link = $settings['booking_link'] ?? '';
        
        $help_menu_roles = isset($settings['help_menu_roles']) ? json_decode($settings['help_menu_roles'], true) : ['Pasien', 'Keluarga Pasien'];
        $help_menu_needs = isset($settings['help_menu_needs']) ? json_decode($settings['help_menu_needs'], true) : ['Dokter', 'Layanan', 'Jadwal'];

        // Convert arrays to newline-separated strings for textarea
        $help_menu_roles = is_array($help_menu_roles) ? implode("\n", $help_menu_roles) : $help_menu_roles;
        $help_menu_needs = is_array($help_menu_needs) ? implode("\n", $help_menu_needs) : $help_menu_needs;

        return view('admin.settings.general', compact('maintenance_mode', 'office_name', 'office_address', 'office_phone', 'office_wa', 'office_email', 'eye_anatomy_image', 'booking_link', 'help_menu_roles', 'help_menu_needs'));
    }

    public function updateGeneral(Request $request)
    {
        // Update Maintenance Mode
        Settings::updateOrCreate(
            ['key' => 'maintenance_mode'],
            ['value' => $request->has('maintenance_mode') ? 'true' : 'false']
        );

        // Update Office Info
        $officeKeys = ['office_name', 'office_address', 'office_phone', 'office_wa', 'office_email'];
        foreach ($officeKeys as $key) {
             Settings::updateOrCreate(
                ['key' => $key],
                ['value' => $request->$key]
            );
        }

        // Update Booking Link
        Settings::updateOrCreate(
            ['key' => 'booking_link'],
            ['value' => $request->booking_link]
        );

        // Update Help Menu Options (Roles)
        $roles = array_filter(array_map('trim', explode("\n", $request->help_menu_roles)));
        Settings::updateOrCreate(
            ['key' => 'help_menu_roles'],
            ['value' => json_encode(array_values($roles))]
        );

        // Update Help Menu Options (Needs)
        $needs = array_filter(array_map('trim', explode("\n", $request->help_menu_needs)));
        Settings::updateOrCreate(
            ['key' => 'help_menu_needs'],
            ['value' => json_encode(array_values($needs))]
        );

        // Upload Eye Anatomy Image
        if ($request->hasFile('eye_anatomy_image')) {
            $request->validate([
                'eye_anatomy_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $path = $request->file('eye_anatomy_image')->store('public/img');
            $url = str_replace('public/', 'storage/', $path);

            Settings::updateOrCreate(
                ['key' => 'eye_anatomy_image'],
                ['value' => $url]
            );
        }

        return back()->with('success', 'Pengaturan umum berhasil diperbarui!');
    }
}