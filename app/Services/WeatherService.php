<?php


namespace App\Services;


use App\Models\Condition;
use App\Models\Weather;
use App\Repositories\WeatherRepository;

class WeatherService
{
    private $weatherRepository;

    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function index()
    {
        return $this->weatherRepository->index();
    }

    public function store($request)
    {

        $weather = $this->check_exists($request->get('lat'), $request->get('lon'));
        $weatherData = $this->get_weather($request);
        if ($this->check_data($weatherData)) {
            if ($weather) {
                $this->weatherRepository->update($weather, $weatherData);
            } else {
                $weatherData['lat'] = $request->get('lat');
                $weatherData['lon'] = $request->get('lon');
                $this->weatherRepository->store($weatherData);
            }
        } else {
            return false;
        }

    }


    public function get_weather($request)
    {
        $WEATHER_API_KEY = env('WEATHER_API_KEY', False);
        $location = "lat=" . $request['lat'] . "&lon=" . $request['lon'];
        $url = "http://api.openweathermap.org/data/2.5/weather?${location}&appid=${WEATHER_API_KEY}";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if ($data) {
            $wItem['wind'] = $data['wind']['speed'];
            $wItem['pressure'] = $data['main']['pressure'];
            $wItem['humidity'] = $data['main']['humidity'];
            $wItem['temperature'] = round($data['main']['temp'] - 273.15);
            return $wItem;
        } else {
            return false;
        }

    }


    public function check_exists($lat, $lon)
    {
        return $this->weatherRepository->check_exists($lat, $lon);
    }


    public function check_data($wItem)
    {
        $conditions = Condition::all();
        $resultCondition = true;
        foreach ($conditions as $condition) {
            $value = $wItem[$condition->name];

            if ($condition->below !== null) {
                if ($value > $condition->below) {
                    $resultCondition = false;
                }
            }
            if ($condition->above !== null) {
                if ($value < $condition->above) {
                    $resultCondition = false;
                }
            }
            if ($condition->equal !== null) {
                if ($value !== $condition->equal) {
                    $resultCondition = false;
                }
            }
        }
        return $resultCondition;
    }


    public function update_all()
    {
        $weathers = Weather::all();
        foreach ($weathers as $weather) {
            $weatherData = $this->get_weather($weather);
            $this->weatherRepository->update($weather, $weatherData);
        }
    }
}