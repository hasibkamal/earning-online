<?php

namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Models\Plan;

class PlanController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $data['plans'] = Plan::where('is_archive',0)->orderBy('name','ASC')->limit(3)->get();
        return view("Frontend::plans.index",$data);
    }
}
