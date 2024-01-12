<?php

namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        return view("Frontend::registration.index");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required| min:4| confirmed',
            'password_confirmation' => 'required| min:4',
        ]);


        $user = new User();
        $user->user_type = '2x202';
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->username = $request->get('username');
        $user->password = Hash::make($request->input('password'));
        $user->status = 1;
        $user->activation_status = 1;
        $user->verification_status = 1;
        $user->approve_status = 1;
        $user->save();

        return redirect(route('registration.index'))->with('flash_success','Signup successfully!');

    }
}
