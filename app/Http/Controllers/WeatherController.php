<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Services\WeatherService;
use Illuminate\Http\Request;


class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $weather = $this->weatherService->index();
        return view('weather', ['weathers' => $weather]);

    }



    public function store(Request $request)
    {
        $forecast = $this->weatherService->store($request);
        if ($forecast){
            return view('weather', ["forecast" => $forecast]);
        } else{
            return redirect()->back();
        }

    }
}