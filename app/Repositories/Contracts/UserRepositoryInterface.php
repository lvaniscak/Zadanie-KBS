<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findAll();

    public function findBy($att, $column);
    public function findAllExcept($id);
    public function createUser($name, $email);
    public function updateUser($id, $data);
    public function getUserHobbies($id);

}