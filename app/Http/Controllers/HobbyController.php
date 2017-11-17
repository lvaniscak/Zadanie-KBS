<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hobby;
use Validator;

class HobbyController extends Controller
{
  public function compare(Request $request)
  {

    $messages = [
      'email.required' => 'Zadajte emailovú adresu !',
    ];
    $validator = Validator::make($request->all(), [
      'email' => 'bail|required',
    ], $messages);
    $expected_user = User::where('email', $request->email)->first();

    if ($validator->fails()) {
      return redirect('hobbies/compare')
      ->withErrors($validator)
      ->withInput();
    }

    if($expected_user == null)
    {
      return redirect('hobbies/compare')
      ->withErrors(['email' => 'Takýto email nie je registrovaný!'])
      ->withInput();
    }

    $my_hobbies = Hobby::where('user_id','=',$expected_user->id)->first();

    $users = User::where('id', '!=', $expected_user->id)->get();
    $list = array();
    $values  = array('swimming','cycling', 'running', 'tourism', 'climbing');

    foreach ($users as $user) {
      $hobbies = new Hobby; 
      $hobbies = $hobbies->getHobbies($user->id);
      $match = 0;

      foreach ($values as  $value) {
        $match = $match + abs($hobbies->$value - $my_hobbies->$value) * 20;
      }
      $match = 100 - $match/5 ;
      $list [$user->name] = $match;


    }

    return view('compareList')->with(array('list' => $list,
    'email' => $request->email));

  }

  public function index()
  {
    return view('compareForm');
  }
}
