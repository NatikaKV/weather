<?php

use App\Models\Condition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConditionTableSeeder extends Seeder
{
    public function run()
    {
        $data = [["name" => 'temperature'],
            ['name' => 'pressure'],
            ['name' => 'humidity'],
            ['name' => 'wind'],
        ];

//        Condition::insert($data); // Eloquent approach
        DB::table('conditions')->insert($data);
//        $this->call('ConditionTableSeeder');

    }

}