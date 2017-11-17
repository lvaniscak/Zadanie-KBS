<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = ['name','email'];

  public function getUser($email)
  {
    return User::select('id')->where('email', $email)->first();
  }
}
