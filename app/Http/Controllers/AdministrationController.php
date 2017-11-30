<?php

namespace App\Http\Controllers;



use App\Repositories\EloquentUserRepository;
use App\Users\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AdministrationController extends Controller
{

    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showLogin()
    {
        return view('adminLogin');
    }

    public function showDashboard(){
        return view('adminDashboard')->with('users',$this->userRepository->findAll());
    }

    public function doLogin()
    {
            $user =  User::where('name', 'admin')->first();

            if($user != null && Input::get('name') == 'admin' && Hash::check(Input::get('password'), $user->password)){
                Auth::login($user);
                return Redirect::to('admin/dashboard');
            }
            else return Redirect::to('admin/login');


    }

    public function showEditModal(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        return view('modals.editUser')->with(['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);


        $edit = User::findOrFail($request['id'])->update($request->all());

        return response()->json($edit);
    }



}
