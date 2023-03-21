<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class CommonController extends Controller
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
    public function getCityByCountry(Request $request)
    {
        $countryId = $request->countryId;
        if (isset($countryId) && $countryId !== "") {
            $citiesList = DB::table('cities')
            ->select('*')
            ->where('country_id', '=', $countryId)
            ->get();
            // set the content type to JSON
            header('Content-Type: application/json');
            echo json_encode($citiesList);
        }
    }
}
