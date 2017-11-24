<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $fillable = ['name','email'];
  public $timestamps = false;

    public function hobbies()
    {
        return $this->hasOne('App\Hobby');
    }


}
