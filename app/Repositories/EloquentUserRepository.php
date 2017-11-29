<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Users\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    protected $user;

  
    public function findAll()
    {
        return User::all();
    }

    public function findBy($att, $column)
    {
        return User::where($att, $column)->first();
    }
}