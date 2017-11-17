<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;

class UserController extends Controller
{
  public function create()
  {
    $hobbies = ['swimming' => 'Plávanie',
    'cycling' => 'Bicyklovanie',
    'running' => 'Beh',
    'tourism' => 'Turistika',
    'climbing' => 'Lezenie'];

    return view('registrationForm')->with('hobbies',$hobbies);
  }



  public function store(Request $request)
  {
    $messages = [
      'email.required' => 'Zadajte emailovú adresu !',
      'email.unique' => 'Tento email je už používaný !',
      'name.required' => 'Zadajte meno !',
      'swimming.required' => 'Vyberte ako sa vám páči plávanie !',
      'cycling.required' => 'Vyberte ako sa vám páči byciklovanie !',
      'running.required' => 'Vyberte ako sa vám páči beh !',
      'tourism.required' => 'Vyberte ako sa vám páči turistika !',
      'climbing.required' => 'Vyberte ako sa vám páči lezenie !',
    ];
    $validator = Validator::make($request->all(), [
      'email' => 'bail|required|unique:users',
      'name' => 'required',
      'swimming' => 'required',
      'cycling' => 'required',
      'running' => 'required',
      'tourism' => 'required',
      'climbing' => 'required',
    ], $messages);

    if ($validator->fails()) {
      return redirect('user/create')
      ->withErrors($validator)
      ->withInput();
    }

    DB::table('users')->insert(
      ['name' => $request->name, 'email' => $request->email]);

      $user = new User;
      $user = $user->getUser($request->email);
      
      DB::table('hobbies')->insert(
        ['user_id' => $user->id,
        'swimming' => $request->swimming,
        'cycling' => $request->cycling,
        'running' => $request->running,
        'tourism' => $request->tourism,
        'climbing' => $request->climbing
      ]);

      return view('registrationDone');
    }
  }
