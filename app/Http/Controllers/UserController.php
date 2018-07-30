<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Ad;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use Session;

class UserController extends Controller
{
	public function getLogout()            // funkcija za logout te usmjeravanje prema home ruti
    {
        Auth::logout();

        Session::flash('logged_out', 'goodbye');

        return redirect()->route('home');
    }

    public function postSignUp(Request $request)  
    {
    	$this->validate($request, [
    		'username' => 'required|min:3|max:50|unique:users',
    		'email' => 'required|email|unique:users',                    //validacija inputa za stvaranje novog korisnika
    		'password' => 'required|min:4|max:120',
    		],
            [
            'username.required' => 'Korisničko ime je obavezno.'
            ]);


    	//REQUESTAMO IZ SIGN UP FORMA U WELCOME.BLADE.PHP

    	$username = $request['username'];
    	$email = $request['email'];
    	$password=bcrypt($request['password']); //ENKRIPTIRAMO LOZINKU

    	$user = new User(); //STVARAMO NOVOG KORISNIKA

    	//PRIMJENJUJEMO VARIJABLE I SPREMAMO KORISNIKA

    	$user->username = $username;
    	$user->email = $email;
    	$user->password = $password;
        $user->money = 0;

    	$user->save();


    	Auth::login($user); // LOGINIRAMO USERA CIM SE REGISTRIRA

    	//USMJERAVAMO DALJE
        Session::flash('registered', 'registered user');

    	return redirect()->route('home');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            ]);

    	if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))         //provjeravamo pašu li uneseni podatci sa onima spremljenima u databazi
    	{
            Session::flash('logged_in', 'welcome');
    		return redirect()->route('home');
    	}

    	return redirect()->back();
    }

    public function getAccount()
    {
        Carbon::setLocale('hr');

        $ad_sort = 'recent';
        $ad_search = '';
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        $ad_count = $ads->count();

        $user = Auth::user();

        $user_id = $user->id;

        $ads_by_user = User::find($user_id)->ads()->orderBy('created_at', 'DESC')->get();

        $ad_count_acc = $ads_by_user->count();

        $user_money = $user->money;

        $ad_text = 'Oglasa';

        if ($ad_count_acc == 1)
        {
            $ad_text = 'Oglas';
        }
        elseif($ad_count_acc == 0)
        {
            $ad_count_acc = 'Nema';
        }


        $user_text= '';



        if ($user_money > 0)
        {
            $user_text = 'Zaradili ste ';
        }
        elseif($user_money == null)
        {
            $user_text = 'Niste još ništa zaradili.';
        }

        $api = session('api');
        $city = session('city');
        $lat = session('lat');
        $lng = session('lng');

        return view('account', ['user' => $user, 'ad_search' => $ad_search, 'ads_by_user' => $ads_by_user, 'ad_count_acc' => $ad_count_acc, 'ad_text' => $ad_text, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng, 'user_text' => $user_text, 'user_money' => $user_money]);
    }

    public function getAccountSettings()
    {
        $ad_sort = '';
        $ad_search = '';

        $user = Auth::user();

        $user_id = $user->id;

        $ads_by_user = User::find($user_id)->ads;

        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        $ad_count = $ads->count();


        if(Auth::check())
        {
            $user_money = Auth::user()->money;
        }
        else
        {
            $user_money = 0;
        }


        $api = session('api');
        $city = session('city');
        $lat = session('lat');
        $lng = session('lng');

        return view('account_settings', ['user' => Auth::user(), 'ad_search' => $ad_search, 'ads_by_user' => $ads_by_user, 'ad_count' => $ad_count, 'ad_sort' => $ad_sort, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng]);
    }

    public function postAccountUpdate(Request $request)
    {
        $ad_search = '';

        $user_settings = Auth::user();

        $user_id = $user_settings->id;

        $ads_by_user = User::find($user_id)->ads;

        $ad_count = $ads_by_user->count();

        $this->validate($request, [
            'username' => 'required|min:3|max:10|',
            ]);


        $username = $request['username'];
        $email = $request['email'];

        $user_settings->username = $username;

        $user_settings->update();

        return redirect()->route('account', ['user' => Auth::user(), 'ad_search' => $ad_search, 'ads_by_user' => $ads_by_user, 'ad_count' => $ad_count]);
    }
}
