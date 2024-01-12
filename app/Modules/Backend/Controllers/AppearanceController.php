<?php

namespace App\Modules\Backend\Controllers;

use App\Modules\Backend\Models\Appearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AppearanceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['appearance'] = Appearance::first();
        return view("Backend::appearance.index", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'description' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'google_plus' => 'required',
            'pinterest' => 'required'
        ]);

        $appearance = Appearance::findOrNew(1);
        $appearance->name = $request->input('name');
        $appearance->email = $request->input('email');
        $appearance->phone = $request->input('phone');
        $appearance->website = $request->input('website');
        $appearance->status = 1;
        $appearance->description = $request->input('description');
        $appearance->address = $request->input('address');
        $appearance->chairman_name = $request->input('chairman_name');
        $appearance->chairman_message = $request->input('chairman_message');
        $appearance->saturday  = $request->input('saturday');
        $appearance->sunday  = $request->input('sunday');
        $appearance->monday  = $request->input('monday');
        $appearance->tuesday  = $request->input('tuesday');
        $appearance->wednesday  = $request->input('wednesday');
        $appearance->thursday  = $request->input('thursday');
        $appearance->friday  = $request->input('friday');
        $appearance->facebook = $request->input('facebook');
        $appearance->youtube = $request->input('youtube');
        $appearance->instagram = $request->input('instagram');
        $appearance->twitter = $request->input('twitter');
        $appearance->linkedin = $request->input('linkedin');
        $appearance->google_plus = $request->input('google_plus');
        $appearance->pinterest = $request->input('pinterest');

        if($request->hasFile('logo')){
            $appearance->logo     = storeFile('appearance',$request->file('logo'));
        }
        if($request->hasFile('chairman_photo')){
            $appearance->chairman_photo     = storeFile('appearance',$request->file('chairman_photo'));
        }
        $appearance->save();

        return redirect()->back()->with('flash_success', 'Appearance saved successfully');
    }
}
