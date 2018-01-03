<?php

namespace App\Http\Controllers;

use App\Hobbies\HobbyComparator;
use App\Http\Requests\CompareFormRequest;

use App\Repositories\EloquentUserRepository;
use Validator;

class HobbyController extends Controller
{
  public function compare(CompareFormRequest $request)
  {


    try {
        $list = (new HobbyComparator(new EloquentUserRepository()))->compare($request->email);
        if($list instanceof \Exception){
            throw $list;
        }

    }
    catch (\Exception $e){
        return $e->getMessage();
  }
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
