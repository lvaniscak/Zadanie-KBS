<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
        return $this->hasOne(Hobby::class);
    }


}
