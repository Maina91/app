<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function selectCountries()
    {
       
        $countries = Country::all(); 
        dd($countries);
        // return view('create', ['countries' => $countries]);
    }

   
   
 
}
