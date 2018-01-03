<?php

namespace App\Http\Controllers;

use App\Hobbies\Hobby;
use App\Http\Requests\RegistrationFormRequest;
use App\Repositories\EloquentUserRepository;
use App\Users\User;
use Validator;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

  public function create()
  {
    return view('registrationForm')->with('hobbies',(new Hobby())->getTranslation());
  }



  public function store(RegistrationFormRequest $request)
  {
      $user = $this->userRepository->createUser($request->name, $request->email);

     $data = $request->only( (new Hobby())->getFillable());
     if($user != null){

         $data['user_id'] = (string)$user->id;
         if(Hobby::create($data) != null){
             return view('registrationDone');
         }
     }


     return redirect('user/create')
         ->withErrors(['email' => 'Registrácia nebola úspešná!'])
         ->withInput();
    }


    public function showAll()
    {
        return view('usersList')->with('users',$this->userRepository->findAll());
    }
}
