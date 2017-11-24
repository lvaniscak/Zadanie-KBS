<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;

class UserController extends Controller
{
  public function create()
  {
    return view('registrationForm')->with('hobbies',(new Hobby())->getTranslation());
  }



  public function store(Request $request)
  {
      $messages = array_merge((new User())->getValidationMessages(),(new Hobby())->getValidationMessages() );
      $rules =  array_merge((new User())->getValidationRules(),(new Hobby())->getValidationRules() );
    $validator = Validator::make($request->all(),$rules , $messages);

    if ($validator->fails()) {
      return redirect('user/create')
      ->withErrors($validator)
      ->withInput();
    }
      $user = User::create(['name' => $request->name, 'email' => $request->email]);

     $data = $request->except(['name', 'email', '_token']);
     $data['user_id'] = (string)$user->id;
     Hobby::create($data);

      return view('registrationDone');
    }
  }
