<?php


namespace App\Repositories;

use App\Models\Weather;

class WeatherRepository
{


    public function __construct(Weather $weather)
    {
        $this->weather = $weather;
    }


    public function index()
    {
        return $this->weather->all();
    }


    public function check_exists($lat, $lon)
    {
        $weather = $this->weather->where([["lat", '=', $lat], ["lon", '=', $lon],])->first();
        if ($weather){
            return $weather;
        }else{
            return false;
        }

    }


    public function store($data)
    {
       return $this->weather->insert($data);
    }


    public function update($weather, $data)
    {
        return $this->weather->where([["lat", '=', $weather->lat], ["lon", '=', $weather->lon],])->update($data);

    }


}