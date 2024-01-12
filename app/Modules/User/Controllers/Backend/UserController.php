<?php

namespace App\Modules\User\Controllers\Backend;


use App\DataTables\User\UserDataTable;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use App\Modules\User\Models\User;
use App\Modules\User\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render("User::backend.user.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['userTypes'] = UserType::where('is_registrable',1)
            ->where('status',1)
            ->where('is_archive',0)
            ->pluck('type_name','id');
//        $data['userDesks'] = UserDesk::where('status',1)
//            ->where('is_archive',0)
//            ->pluck('desk_name','id');
        return view('User::backend.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'user_type' => 'required',
            'password' => 'required| min:4| confirmed',
            'password_confirmation' => 'required| min:4',
        ]);

        $user = new User();
        $user->user_type = $request->get('user_type');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->input('password'));
        $user->status = 1;
        $user->activation_status = 1;
        $user->verification_status = 1;
        $user->approve_status = 1;
        $user->save();

        return redirect(route('admin.users.index'))->with('success','User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($userId)
    {
        $decodedUserId = Encryption::decodeId($userId);
        $data['user'] = User::find($decodedUserId);
        $data['userTypes'] = UserType::where('is_registrable',1)
            ->where('status',1)
            ->where('is_archive',0)
            ->pluck('type_name','id');
//        $data['userDesks'] = UserDesk::where('status',1)
//            ->where('is_archive',0)
//            ->pluck('desk_name','id');
        return view("User::backend.user.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {
        $this->validate($request, [
            'name' => 'required',
            'user_type' => 'required',
            'password' => 'required| min:4| confirmed',
            'password_confirmation' => 'required| min:4',
        ]);

        $decodedUserId = Encryption::decodeId($userId);
        $user = User::find($decodedUserId);
        $user->user_type = $request->get('user_type');
        $user->desk_id = UserDesk::where('user_type',$request->get('user_type'))->value('id');
        $user->name = $request->get('name');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make($request->input('password'));
        $user->status = 1;
        $user->activation_status = 1;
        $user->verification_status = 1;
        $user->approve_status = 1;
        $user->save();
        return redirect(route('admin.users.index'))->with('success','User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function approveUser($userId){
        $decodedId = Encryption::decodeId($userId);
        $user = User::find($decodedId);
        $user->approve_status = 1;
        $user->activation_status = 1;
        $user->verification_status = 1;
        $user->save();


        return redirect()->back()->with('success', 'User approved!');
    }

    public function activateUser($userId){
        $decodedId = Encryption::decodeId($userId);
        $user = User::find($decodedId);
        $user->activation_status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User activated!');
    }

    public function deactivateUser($userId){
        $decodedId = Encryption::decodeId($userId);
        $user = User::find($decodedId);
        $user->activation_status = 0;
        $user->save();
        redirect()->back()->with('success', 'User deactivated!');
    }
}
