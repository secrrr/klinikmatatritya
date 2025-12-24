<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with('career')->latest()->paginate(10);
        return view('admin.job-applications.index', compact('applications'));
    }

    public function show(JobApplication $jobApplication)
    {
        return view('admin.job-applications.show', compact('jobApplication'));
    }

    public function destroy(JobApplication $jobApplication)
    {
        if ($jobApplication->cv_path && Storage::disk('public')->exists($jobApplication->cv_path)) {
            Storage::disk('public')->delete($jobApplication->cv_path);
        }
        $jobApplication->delete();
        return redirect()->route('admin.job-applications.index')->with('success', 'Lamaran berhasil dihapus.');
    }

    public function reply(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required', // WYSIWYG content
        ]);

        // Logic to send email
        // Example: Mail::to($jobApplication->email)->send(new \App\Mail\JobReplyMail($request->subject, $request->message));
        
        // For now, we utilize the Mail facade directly or mock it
        try {
            Mail::send([], [], function ($message) use ($jobApplication, $request) {
                $message->to($jobApplication->email)
                        ->subject($request->subject)
                        ->html($request->message); // Send WYSIWYG content as HTML
            });
            
            $jobApplication->status = 'reviewed';
            $jobApplication->save();

            return redirect()->back()->with('success', 'Email balasan berhasil dikirim.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengirim email: ' . $e->getMessage());
        }
    }
}
