<?php


namespace App\Repositories;

use App\Models\Condition;

class ConditionRepository
{

    public function __construct(Condition $condition)
    {
        $this->condition = $condition;
    }


    public function index()
    {
        return $this->condition->whereNotNull('id')->get();
    }

    public function update($type, $data)
    {
        return Condition::where('name', $type)->update($data);


    }


}