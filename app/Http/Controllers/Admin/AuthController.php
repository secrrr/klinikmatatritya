<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    public function showLogin(){ return view('admin.auth.login'); }
    public function login(Request $r){
        $u = $r->input('username'); $p = $r->input('password');
        if($u === env('ADMIN_USERNAME','admin') && $p === env('ADMIN_PASSWORD','password')){
            session(['is_admin'=>true]); return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['msg'=>'Login gagal']);
    }
    public function logout(){ session()->forget('is_admin'); return redirect()->route('admin.login'); }
}
