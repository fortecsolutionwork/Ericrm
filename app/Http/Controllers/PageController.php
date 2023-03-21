<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('account/home');
    // }


    public function gallary(Request $request)
    {
        return view('master.gallary');
    }


    public function unauthorized(Request $request)
    {
        if (auth()->check()) {
            $role = DB::table('users')
                ->select('*')
                ->where('id', '=', auth()->id())
                ->first();
            return view('unauthorized', ['role' => $role]);
        }
    }

    public function services(Request $request)
    {
        return view('master.services');
    }
    public function uniqueWebsite(Request $request)
    {
        return view('master.unique-website');
    }
    public function presentationTemplateDesign(Request $request)
    {
        return view('master.presentation-template-design');
    }
    public function NFCBusinessCard(Request $request)
    {
        return view('master.NFC-business-card');
    }
}
