<?php

namespace App\Services;
use App\Repositories\ConditionRepository;


class ConditionService
{
    private $conditionRepository;

    public function __construct(ConditionRepository $conditionRepository)
    {
        $this->conditionRepository = $conditionRepository;
    }


    public function update($request)
    {
        $data = [];
        if($request->get('above')){
            $data['above'] = $request->get('above');
        }
        if ($request->get('below')){
            $data['below'] = $request->get('below');
        }
        if ($request->get('equal')){
            $data['equal'] = $request->get('equal');
        }
        $this->conditionRepository->update($request->get('type'), $data);
        return true;


    }
}