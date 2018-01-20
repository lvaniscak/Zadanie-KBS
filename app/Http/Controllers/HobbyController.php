<?php

namespace App\Http\Controllers;

use App\Hobbies\HobbyComparator;
use App\Http\Requests\CompareFormRequest;
use App\Repositories\EloquentUserRepository;
use Illuminate\Support\Facades\Log;
use Psr\Log\InvalidArgumentException;
use Validator;

class HobbyController extends Controller
{
    protected $userRepository;

    public function __construct(EloquentUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function compare(CompareFormRequest $request)
    {


        try {
            if(!$request->email){
                throw new InvalidArgumentException("Email missing");
            }
            $list = (new HobbyComparator($this->userRepository))->compare($request->email);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect('hobbies/compare')
                ->withErrors(['email' => 'Nastal problem počas spracovania.'])
                ->withInput();
        }
        if ($list == null) {
            return redirect('hobbies/compare')
                ->withErrors(['email' => 'Takýto email nie je registrovaný!'])
                ->withInput();
        }


        return view('compareList')->with(array(
            'list' => $list,
            'email' => $request->email
        ));

    }

    public function index()
    {
        return view('compareForm');
    }
}
