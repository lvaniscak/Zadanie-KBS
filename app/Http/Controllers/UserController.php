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
      $user = User::create(['name' => $request->name, 'email' => $request->email]);

     $data = $request->except(['name', 'email', '_token']);
     $data['user_id'] = (string)$user->id;
     Hobby::create($data);

      return view('registrationDone');
    }


    public function showAll()
    {
        return view('usersList')->with('users',$this->userRepository->findAll());
    }
}
