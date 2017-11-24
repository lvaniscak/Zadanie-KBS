<?php

namespace App\Hobbies;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
      protected $fillable = ['user_id','swimming','running','cycling','tourism','climbing'];
      public $timestamps = false;

      protected $validationRules = [
          'swimming' => 'required',
          'cycling' => 'required',
          'running' => 'required',
          'tourism' => 'required',
          'climbing' => 'required',
      ];

      protected $validationMessages = [
          'swimming.required' => 'Vyberte ako sa vám páči plávanie !',
          'cycling.required' => 'Vyberte ako sa vám páči byciklovanie !',
          'running.required' => 'Vyberte ako sa vám páči beh !',
          'tourism.required' => 'Vyberte ako sa vám páči turistika !',
          'climbing.required' => 'Vyberte ako sa vám páči lezenie !',
      ];

      public function getTranslation()
      {
          $hobbies = ['swimming' => 'Plávanie',
              'cycling' => 'Bicyklovanie',
              'running' => 'Beh',
              'tourism' => 'Turistika',
              'climbing' => 'Lezenie'];

        return $hobbies;
      }

      public function getValidationRules(){
          return $this->validationRules;
      }

      public function getValidationMessages(){
          return $this->validationMessages;
      }

    public function user() {
        return $this->belongsTo(\App\Users\User::class);
    }
}
