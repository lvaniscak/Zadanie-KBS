<?php

namespace App\Http\Controllers;

use App\Hobbies\HobbyComparator;
use App\Http\Requests\CompareFormRequest;
use App\Repositories\EloquentUserRepository;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use LogicException;
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
            $list = (new HobbyComparator($this->userRepository))->compare($request->email);

        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
            return $this->redirectWithError('Takýto email nie je registrovaný!');
        } catch (LogicException $e) {
            Log::error($e->getMessage());
            return $this->redirectWithError('Nexistujú používatelia pre porovnanie');
        }

        return view('compareList')->with(array(
            'list' => $list,
            'email' => $request->email
        ));

    }

    public function redirectWithError($errorMessage)
    {
        return redirect('hobbies/compare')
            ->withErrors(['email' => $errorMessage])
            ->withInput();
    }

    public function index()
    {
        return view('compareForm');
    }
}
