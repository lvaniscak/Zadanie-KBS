<?php

namespace App\Users;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements Authenticatable
{
    use PresentableTrait;
    use \Illuminate\Auth\Authenticatable;

    protected $presenter = \App\Users\UserPresenter::class;
  protected $fillable = ['name','email', 'password'];
  public $timestamps = false;



    public function hobbies()
    {
        return $this->hasOne(\App\Hobbies\Hobby::class);
    }


}
