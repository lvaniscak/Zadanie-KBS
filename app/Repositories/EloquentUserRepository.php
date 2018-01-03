<?php

namespace App\Repositories;

use App\Users\User;

class EloquentUserRepository implements Contracts\UserRepositoryInterface
{
    public function findAll()
    {
        return User::where('name', '!=', 'admin')->get();
    }

    public function findBy($att, $column)
    {
        return User::where($att, $column)->first();
    }

    public function updateUser($id, $data){
      return   User::findOrFail($id)->update($data);
    }
}