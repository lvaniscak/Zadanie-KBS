<?php

namespace App\Http\Controllers;

use App\Hobbies\HobbyComparator;
use App\Http\Requests\CompareFormRequest;

use Validator;

class HobbyController extends Controller
{
  public function compare(CompareFormRequest $request)
  {



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
