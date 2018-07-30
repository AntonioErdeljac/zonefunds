<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Response;

use App\Ad;

use App\User;

use Image;

use Location;

use Session;


class AdController extends Controller
{ 
    public function postadcomplete(Request $request)
    {

        $ad_id = $request['ad_id'];

        $ad = Ad::findOrFail($ad_id);

        $completed_by = $request['user_complete'];

        $user_complete = User::where('username',$completed_by)->first();

        if($user_complete != null)
        {
            $user_complete->money += $ad->ad_price;
            $user_complete->update();
        }
        

        $ad->delete();

        Session::flash('ad_completed', 'success');

        return redirect()->route('home');

    }

    public function ajaxload()
    {

        $ad_sort = '';
        $ad_search = '';
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        $ad_count = $ads->count();

        return view('ajaxtest', ['ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'user' => Auth::user(), 'ad_count' => $ad_count]);
    }

    public function getAjaxTest()
    {
        $username = Auth::user()->username;

        return response()->json(['username' => $username]);
    }


    public function getMobileCreateAd()
    {
        $ad_sort ='';
        $ad_search = '';
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        $ad_count = $ads->count();
        $user = Auth::user();
        $city = session('city');
        return view('mobile_ad_create', ['ad_search' => $ad_search, 'user' => $user, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city]);
    }



    public function getShowUpdate($id)
    {
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost
        $city = session('city');
        $api = session('api');
        $lng = session('lng');
        $lat = session('lat');

        $ad_count = $ads->count();
        $ad_update = Ad::findOrFail($id); // koristeci laravelovu findOrFail() funkciju POKUSAVAMO odabrati odabrani ad putem ID// vrsimo get() na prijasnju vrijednost
        $ad_search = ''; // postavljamo search input na prazno zbog manjka problema
        $ad_sort = '';
        if (Auth::user())  //provjeravamo postoji li ulogirani korisnik ili gost te biramo opcije
        {
            $user = Auth::User();
            $user_username = $user->username;
            return view('update_ad', ['ad_update' => $ad_update, 'user' => $user, 'ads' => $ads, 'ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng ]);
        }
        else
        {

            return view('update_ad', ['ads' => $ads, 'ad_update' => $ad_update, 'ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng]);

        }
    }


	public function getDashboard(Request $request) //ucitavamo dashboard, sortiramo oglase po najnovijima, moguca promjena u najblize
	{
        Carbon::setLocale('hr');

        

        if($request->session()->has('lat') == false || $request->session()->has('lat') == false)
        {
            return redirect()->route('blankroute');
        }


        
        //$ad_sort = $request[]
        //$json_object = file_get_contents('http://ipinfo.io'); // dobivamo .json sa ipinfo
       // $json_decoded = json_decode($json_object, true); // dekodiramo.json
        //$session_location = $json_decoded['city']; // svrstavamo string iz jsona u varijablu
        $ad_search = $request['ad_search']; //requestamo input za search
        $ad_sort = $request['ad_sort']; //requestamo options za sortiranje


        if(empty($ad_sort)) // postavljamo default sortiranje u slucaju da nista nije odabrano
        {
            $ad_sort = 'recent';
        }

        if($ad_sort == 'low') // postavljamo sortiranje na lowest price
        {
            $ads = Ad::orderBy('ad_price', 'ASC');
        }
        else if($ad_sort == 'high') // postavljamo sortiranje na highest price
        {
            $ads = Ad::orderBy('ad_price', 'DESC');
        }
        /*else if($ad_sort == 'nearest') //postavljamo sortiranje na recent
        {
            $ads = Ad::wherebetween('ad_location_coords_lat', array($session_location_coords_lat-0,$session_location_coords_lat+0 ));
        }*/
        else if($ad_sort == 'recent') //postavljamo sortiranje na recent
        {
            $ads = Ad::latest();
        }

        if (!empty($ad_search)) //provjeravamo ako je search input NIJE prazan
        {
            $ads = $ads
                   ->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->where('ad_title', 'like', '%'.$ad_search.'%') // provjeravamo uneseni input searcha sa postojecim body i title u postojecim ad-ovima
                   ->orwhere('ad_body', 'like', '%'.$ad_search.'%');
                   
        }
        else
        {

        
        }

        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost

        $ad_count;

        if(Auth::check())
        {
            $user_money = Auth::user()->money;
        }
        else
        {
            $user_money = 0;
        }

        

        $city = session('city');

        $lng = session('lng');

        $lat = session('lat');

        $api = session('api');


        if(empty($ad_search))
        {
            $ad_count = $ads->count();
        }
        else
        {
            $ad_count = 2000;
        }
        

    

        if (Auth::user())  //provjeravamo postoji li ulogirani korisnik ili gost te biramo opcije
        {
            $user = Auth::User();
            $user_username = $user->username;
            return view('dashboard', ['ads' => $ads, 'user' => $user, 'ad_search' => $ad_search/*, 'session_location' => $session_location*/, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lng' => $lng, 'lat' => $lat, 'user_money' => $user_money]);
        }

        
        


        return view('dashboard', ['ads' => $ads, 'ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lng' => $lng, 'lat' => $lat, 'user_money' => $user_money]);
		
	}

    public function postCreateAd(Request $request)
    {
    	$this->validate($request, [                          //validiramo inpute za stvaranje oglasa
    		'ad_title' => 'required|min:3|max:120',
    		'ad_body' => 'required|min:50|max:1000',
    		'ad_contact' => 'required',
    		'ad_price' => 'required|min:0|max:9999999999999',
            'ad_location' => 'required'
    		]);

    	$ad = new Ad();

    	$ad_title = $request['ad_title'];           //povlacimo unos iz inputa te ih svrstavljamo u varijablu
    	$ad_body = $request['ad_body'];
    	$ad_contact = $request['ad_contact'];
    	$ad_price = $request['ad_price'];
        $ad_location = $request['ad_location'];
        $ad_location_coords_lat = $request['ad_location_coords_lat'];
        $ad_location_coords_lng = $request['ad_location_coords_lng'];

        if($ad_location == 'Unknown')
        {
            $get_json = @file_get_contents('http://ip-api.com/json/');
            $decode_json = json_decode($get_json, true);
            $city = $decode_json['city'];
            $lat = $decode_json['lat'];
            $lng = $decode_json['lon'];
            $ad_location = $city;
            $ad_location_coords_lat = $lat;
            $ad_location_coords_lng = $lng;
        }

    	$ad->ad_title=$ad_title;
    	$ad->ad_body=$ad_body;
    	$ad->ad_contact=$ad_contact;           //primjenjujemo varijable databazi
    	$ad->ad_price=$ad_price;
        $ad->ad_location = $ad_location;
        $ad->ad_location_coords_lat = $ad_location_coords_lat;
        $ad->ad_location_coords_lng = $ad_location_coords_lng;

    	if($request->hasFile('ad_image'))  //provjeravamo dali je prenesena datoteka
    	{

    		$file = $request->file('ad_image');
    		$filename = $file->getClientOriginalName();
    		$request->file('ad_image')->move('image/',$filename);
            Image::make('image/'.$filename)->orientate()->resize(1280, 720)->save('image/'.$filename);  //postavljamo posebnu velicinu za sve slike
    		$ad->ad_image=$filename;
    	}else
    	{
    		$ad->ad_image='default.jpg';  // postavljamo default 'no image found' sliku u slucaju da slika nije prenesena
    	}

    	$request->user()->ads()->save($ad); // spremamo $ad varijablu zajedno sa user_id koji smo dobili eloquent vezom izmedju usera i ads-a (User.php , Ad.php)

        Session::flash('message', 'Success');

    	return redirect()->route('home'); //preusmjeravamo u dashboard
    }





    public function postUpdateAd(Request $request, $ad_id)
    {
        $this->validate($request, [                          //validiramo inpute za stvaranje oglasa
            'ad_title' => 'required|min:3|max:120',
            'ad_body' => 'required|min:50|max:1000',
            'ad_contact' => 'required',
            'ad_price' => 'required',
            'ad_location' => 'required'
            ]);

        $ad = Ad::where('id', $ad_id)->first();

        $ad_title = $request['ad_title'];           //povlacimo unos iz inputa te ih svrstavljamo u varijablu
        $ad_body = $request['ad_body'];
        $ad_contact = $request['ad_contact'];
        $ad_price = $request['ad_price'];
        $ad_location = $request['ad_location'];
        $ad_location_coords_lat = $request['ad_location_coords_lat'];
        $ad_location_coords_lng = $request['ad_location_coords_lng'];

        $ad->ad_title=$ad_title;
        $ad->ad_body=$ad_body;
        $ad->ad_contact=$ad_contact;           //primjenjujemo varijable databazi
        $ad->ad_price=$ad_price;
        $ad->ad_location = $ad_location;
        $ad->ad_location_coords_lat = $ad_location_coords_lat;
        $ad->ad_location_coords_lng = $ad_location_coords_lng;

        if($request->hasFile('ad_image'))  //provjeravamo dali je prenesena datoteka
        {

            $file = $request->file('ad_image');
            $filename = $file->getClientOriginalName();
            $request->file('ad_image')->move('image/',$filename);
            Image::make('image/'.$filename)->resize(1280, 720)->save('image/'.$filename);  //postavljamo posebnu velicinu za sve slike
            $ad->ad_image=$filename;
        }else
        {
            $ad->ad_image='default.jpg';  // postavljamo default 'no image found' sliku u slucaju da slika nije prenesena
        }

        $ad->update(); // spremamo $ad varijablu zajedno sa user_id koji smo dobili eloquent vezom izmedju usera i ads-a (User.php , Ad.php)

        Session::flash('updated', 'updated');

        return redirect()->route('home'); //preusmjeravamo u dashboard
    }








    public function getDeleteAd($ad_id)
    {
    	$ad = Ad::where('id', $ad_id)->first();  //pronalazimo odabrani oglas
    	if (Auth::user() != $ad->user)  // vršimo validaciju korisnika  (kreator oglasa mora biti isti kao trenutni korisnik koji zahtjeva brisanje oglasa) te gledamo ako je RAZLICIT od kreatora
    	{
    		return redirect()->back();  // u slucaju razlicitog korisnika ne dopustavamo brisanje te saljemo korisnika natrag
    	}

    	$ad->delete();  // inace brisemo oglas

    	return redirect()->route('home'); // preusmjeravamo 
    }










    public function getShowAd($id) // funkcija za prikazivanja oglasa
    {
        Carbon::setLocale('hr');
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        if(Auth::check())
        {
            $user_money = Auth::user()->money;
        }
        else
        {
            $user_money = 0;
        }

        $ad_count = $ads->count();
        $ad_sort = '';
        $ad_select = Ad::findOrFail($id); // koristeci laravelovu findOrFail() funkciju POKUSAVAMO odabrati odabrani ad putem ID
        $ad_search = ''; // postavljamo search input na prazno zbog manjka problema

        $city = session('city');
        $api = session('api');
        $lng = session('lng');
        $lat = session('lat');

        if (Auth::user())  //provjeravamo postoji li ulogirani korisnik ili gost te biramo opcije
        {
            $user = Auth::User();
            $user_username = $user->username;
            return view('ad_show_sep', ['ad_select' => $ad_select, 'user' => $user, 'ads' => $ads, 'ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng, 'user_money' => $user_money ]);
        }
        else
        {

            return view('ad_show_sep', ['ads' => $ads, 'ad_select' => $ad_select, 'ad_search' => $ad_search, 'ad_sort' => $ad_sort, 'ad_count' => $ad_count, 'city' => $city, 'api' => $api, 'lat' => $lat, 'lng' => $lng, 'user_money' => $user_money]);

        }
    }

    public function postmsg()
    {
        $msg = ['1', '2', '3','4','5','antonio erdeljac'];

        return response()->json(array('msg'=>$msg), 200);
    }

    public function getmsg()
    {
        return view('ajax');
    }

    public function postnotifications()
    {
        $ads = Ad::latest();
        $ads = $ads->wherebetween('ad_location_coords_lat', array(session('lat')-0.5, session('lat')+0.5))
                   ->wherebetween('ad_location_coords_lng', array(session('lng')-0.5, session('lng')+0.5))
                   ->get(); // vršimo get() naredbu na sve prijašnje određene vrijednost


        $ad_count = $ads->count();

        $notif = $ads->count();

        if(Auth::check())
        {
           $user_money_r = Auth::user()->money; 
        }
        else
        {
            $user_money_r = 0;
        }

        

        return response()->json(array('notif' => $notif, 'user_money' => $user_money_r));
    }

    public function getblank()
    {
        return view('blank');
    }

    public function postsavesession(Request $request)
    {
        session(['lng' => $request['lng']]);
        session(['lat' => $request['lat']]);
        session(['city' => $request['user_location']]);
        session(['api' => $request['api_used']]);


        //TEST ZA SPLIT 

        /*session(['lng' => 16.440193]);
        session(['lat' => 43.508133]);
        session(['city' => 'Split']);
        session(['api' => 'ne']);*/


        return redirect()->route('home');
    }

    public function postrefreshlocation(Request $request)
    {
        Session::forget('lng', 'lat', 'city', 'api');

        return redirect()->route('blankroute');
    }

}
