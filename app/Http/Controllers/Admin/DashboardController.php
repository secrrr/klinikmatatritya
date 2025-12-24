<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service; use App\Models\Article; use App\Models\Doctor;
class DashboardController extends Controller
{
    public function index(){
        $services = Service::count(); $articles = Article::count(); $doctors = Doctor::count();
        return view('admin.dashboard', compact('services','articles','doctors'));
    }
}
