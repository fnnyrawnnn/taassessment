<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $role = DB::table('user_role')->where('user_id', $id)->select('role_id')->first();
        if($role->role_id == 'superadmin' || $role->role_id == 'admin' || $role->role_id == 'admin_pm' || $role->role_id == 'admin_ap' || $role->role_id == 'admin_ot' || $role->role_id == 'admin_tnd' || $role->role_id == 'user'){
            session(['permission' => $role->role_id]);
            return view('home');
        } else {
            session(['permission' => 'guest']);
            $company = DB::table('company')->count('name');
            $employee = User::count('name');
            return view('welcome')->with([
                'company' => $company,
                'employee' => $employee
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function email()
    {
        return view('layouts.email');
    }
}
