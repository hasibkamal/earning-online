<?php

namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\CommonFunction;
use App\Modules\Backend\Models\Gallery;
use App\Modules\Backend\Models\Plan;
use App\Modules\Backend\Models\Slider;

class HomeController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        CommonFunction::setCompanyInfo();
//        $data['plans'] = cache('plans',function (){
//            $plans = Plan::where('is_archive',0)->orderBy('ordering','ASC')->limit(3)->get();
//            cache()->put('plans',$plans);
//            return $plans;
//        });
//        $data['gallery'] = cache('gallery',function (){
//            $gallery = Gallery::where('is_archive',0)->orderBy('ordering','ASC')->limit(12)->get();
//            cache()->put('gallery',$gallery);
//            return $gallery;
//        });
//        $data['sliders'] = cache('sliders',function (){
//            $sliders = Slider::where('is_archive',0)->orderBy('ordering','ASC')->limit(3)->get();
//            cache()->put('sliders',$sliders);
//            return $sliders;
//        });

        $data['plans'] = Plan::where('is_archive',0)->orderBy('name','ASC')->limit(3)->get();
        $data['gallery'] = Gallery::where('is_archive',0)->orderBy('ordering','ASC')->limit(16)->get();
        $data['sliders'] = Slider::where('is_archive',0)->orderBy('ordering','ASC')->limit(3)->get();

        return view("Frontend::index",$data);
    }
}
