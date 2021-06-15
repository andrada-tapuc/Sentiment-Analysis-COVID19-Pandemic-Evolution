<?php

namespace App\Http\Controllers;

use App\ContinentFrequency;
use App\CoronaFrequency;
use App\CountryFrequency;
use App\Location;
use App\ModelBigram;
use App\ModelTrigram;
use App\ModelUnigram;
use App\VaccinFrequency;
use Illuminate\Http\Request;
use App\Charts\SentimentFrequencyChart;
use App\SentimentFrequency;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

}
