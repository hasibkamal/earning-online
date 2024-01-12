<?php

namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Models\Appointment;
use App\Modules\Backend\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("Frontend::contact-us");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'message'       => 'required',
        ]);

        $phone = '+880'.substr($request->input('phone'), -10,10);
        $contactUs = ContactUs::whereDate('created_at',Carbon::today()->toDateString())->firstOrNew(['phone'=>$phone]);
        $contactUs->name = $request->input('name');
        $contactUs->email = $request->input('email');
        $contactUs->phone = $phone;
        $contactUs->message = $request->input('message');
        $contactUs->status = 1;
        $contactUs->save();
        return redirect(url('/contact'))->with('flash_success', 'Contact request received.');
    }
}
