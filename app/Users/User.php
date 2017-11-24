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


   protected $validationRules = [
        'email' => 'bail|required|unique:users',
        'name' => 'required',
    ];

    protected $validationMessages = [
        'email.required' => 'Zadajte emailovú adresu !',
        'email.unique' => 'Tento email je už používaný !',
        'name.required' => 'Zadajte meno !',
    ];

    public  function getValidationRules(){
        return $this->validationRules;
    }

    public function getValidationMessages(){
        return $this->validationMessages;
    }

    public function hobbies()
    {
        return $this->hasOne(\App\Hobbies\Hobby::class);
    }


}
