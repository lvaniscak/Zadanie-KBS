<?php

namespace App\Users;

use App\Hobbies\Hobby;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class User extends Model implements Authenticatable
{
    use PresentableTrait;
    use \Illuminate\Auth\Authenticatable;

    protected $presenter = UserPresenter::class;
    protected $fillable = ['name', 'email'];
    public $timestamps = false;
    public $remember_token = false;


    public function hobbies()
    {
        return $this->hasOne(Hobby::class);
    }


}
