<?php

namespace App\Http\Controllers;


use App\Http\Requests\AdminLoginRequest;
use App\Repositories\EloquentUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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
        if (!Auth::check()) {
            return view('adminLogin');
        }
        return redirect('admin/dashboard');


    }

    public function showDashboard()
    {
        if (Auth::check()) {
            return view('adminDashboard')->with('users', $this->userRepository->findAll());
        }

        return \redirect('admin/login');
    }

    public function doLogin(AdminLoginRequest $request)
    {
        $admin = $this->userRepository->findBy('name', 'admin');

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($admin != null && Input::get('email') == $admin->email) {
            if (Auth::attempt($credentials, false)) {

                return redirect('admin/dashboard');
            }
        }

        return redirect('admin/login')
            ->withErrors(['email' => 'Nepodarilo sa prihlásiť. Zle prihlasovacie údaje!'])
            ->withInput();


    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function showEditModal(Request $request)
    {
        $user = $this->userRepository->findBy('id', $request->id);
        return view('modals.editUser')->with(['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);


        $edit = $this->userRepository->updateUser($request['id'], $request->all());

        return response()->json($edit);
    }


}
