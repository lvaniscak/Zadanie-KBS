<?php

namespace App\Repositories;

use App\Users\User;

class EloquentUserRepository
{
    public function findAll()
    {
        return User::where('name', '!=', 'admin')->get();
    }

    public function findBy($att, $column)
    {
        return User::where($att, $column)->first();
    }

    public function findAllExcept($id)
    {
        return User::where('id', '!=', $id)->get();
    }

    public function updateUser($id, $data)
    {
        return User::findOrFail($id)->update($data);
    }

    public function createUser($name, $email)
    {
        return User::create(['name' => $name, 'email' => $email]);
    }

    public function getUserHobbies($id)
    {
        return User::where('id', $id)->first()->hobbies;
    }
}