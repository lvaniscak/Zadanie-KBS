<?php

namespace App\Users;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class User extends Model
{
    use PresentableTrait;

    protected $presenter = \App\Users\UserPresenter::class;
  protected $fillable = ['name','email'];
  public $timestamps = false;



    public function hobbies()
    {
        return $this->hasOne(\App\Hobbies\Hobby::class);
    }


}
