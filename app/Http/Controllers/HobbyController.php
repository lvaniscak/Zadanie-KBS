<?php

namespace App\Http\Controllers;

use App\Hobbies\HobbyComparator;
use Illuminate\Http\Request;
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


    if ($validator->fails()) {
      return redirect('hobbies/compare')
      ->withErrors($validator)
      ->withInput();
    }

    $list = HobbyComparator::compare($request->email);
    if($list == null)
    {
      return redirect('hobbies/compare')
      ->withErrors(['email' => 'Takýto email nie je registrovaný!'])
      ->withInput();
    }


    return view('compareList')->with(array('list' => $list,
    'email' => $request->email));

  }

  public function index()
  {
    return view('compareForm');
  }
}
