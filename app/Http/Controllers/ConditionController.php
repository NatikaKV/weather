<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Services\ConditionService;
use Illuminate\Http\Request;


class ConditionController extends Controller
{
    protected $conditionService;

    public function __construct(ConditionService $conditionService)
    {
        $this->conditionService = $conditionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $this->conditionService->update($request);
        return redirect()->back();


    }


}