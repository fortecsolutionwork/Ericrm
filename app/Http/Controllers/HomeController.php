<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role = DB::table('users')
            ->select('*')
            ->where('id', '=', auth()->id())
            ->first();
        if ($role->fk_role_id == 1) {
            $url = 'dashboardadmin';
        } else {
            $url = 'dashboard';
        }
        return redirect()->route($url);
    }
}
