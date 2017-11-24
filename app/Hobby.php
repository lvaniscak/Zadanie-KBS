<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
      protected $fillable = ['swimming','running','cycling','tourism','climbing'];
      public $timestamps = false;

      public function getHobbies($user_id)
      {
        return Hobby::where('user_id','=',$user_id)->first();
      }
}
