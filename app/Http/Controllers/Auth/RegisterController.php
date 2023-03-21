<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/account/dashboard';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            //'position' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'term_contion' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                'regex:/[a-z]/', // at least one lowercase letter
                'regex:/[A-Z]/', // at least one uppercase letter
            ],
            //'phone_number' => ['required', 'number'], // add the new rule for phone number
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       //dd($data);
        // dd($data['development_process_data']);
        // dd($data['about_website']);
        // dd($data['goal']);

            $digits = 10;
            $rand = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $is = DB::table("users")
                ->where("referral_code", $rand)
                ->get();
            $add = 1;
            if ($is) {
                $randn = $rand + $add;
            } else {
                $randn = $rand;
            }
            $prefix = preg_replace("/[^a-zA-Z0-9]/", "",$data['email']);
            if (strlen($prefix) > 4) {
                $prefix = substr($prefix, 0, 2);
            }
            $randn = $prefix.$randn;
            $inserts = User::create([
            'name' => $data['name'],
             'last_name' => $data['last_name'],
             'company_name' => $data['company_name'],
             'position' => $data['position'],
            // 'phone_code' => $data['phone_code'],
             'phone_number' => $data['phone_number'],
            'email' => $data['email'],
             'referral_code' => $randn,
             'term_contion' => $data['term_contion'],
            'password' => Hash::make($data['password']),
        ]);
    
      $userId =  $inserts['id'];
    
        if (!empty($userId)) {
            if (!empty($data['business_type'])) {
                foreach ($data['business_type'] as $business_type) {
                    $insert = [
                        "fk_business_type_id" => $business_type,
                        "fk_user_id" => $userId ,
                    ];
                    DB::table("user_business_type")->insert($insert);
                  
                }
            }
            if (!empty($data['development_process'])) {
                foreach ($data['development_process'] as $development_process) {
                    $insert = [
                        "fk_development_process_id" => $development_process,
                        "fk_user_id" => $userId ,
                    ];
                    DB::table("user_development_process")->insert($insert);
                   
                }
            }
            if (!empty($data['about_website'])) {
                foreach ($data['about_website'] as $about_website) {
                    $insert = [
                        "fk_about_website_id" => $about_website,
                        "fk_user_id" => $userId ,
                    ];
                    DB::table("user_about_website")->insert($insert);
               
                }
            }
            if (!empty($data['goal'])) {
                foreach ($data['goal'] as $goal) {
                    $insert = [
                        "fk_goals_id" => $goal,
                        "fk_user_id" => $userId ,
                    ];
                    DB::table("user_goals")->insert($insert);
                  ;
                }
            }
            return $inserts;
        }
    }
}
