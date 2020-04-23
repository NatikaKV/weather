<?php

namespace App\Console\Commands;

use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Services\WeatherService;


class GetWeather extends Command
{
    protected $weatherService;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:getweatherdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $time = Carbon::now()->format('d/m/Y H:i:s');
        Log::info("(${time}): weather cron started");
        $this->weatherService->update_all();
        $time = Carbon::now()->format('d/m/Y H:i:s');
        Log::info("(${time}): weather data updated!" );
    }
}
