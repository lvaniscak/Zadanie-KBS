<?php

namespace App\Hobbies;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
      protected $fillable = ['user_id','swimming','running','cycling','tourism','climbing'];
      public $timestamps = false;



      public function getTranslation()
      {
          $hobbies = ['swimming' => 'Plávanie',
              'cycling' => 'Bicyklovanie',
              'running' => 'Beh',
              'tourism' => 'Turistika',
              'climbing' => 'Lezenie'];

        return $hobbies;
      }


    public function user() {
        return $this->belongsTo(\App\Users\User::class);
    }
}
