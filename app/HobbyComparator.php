<?php

namespace App;



class HobbyComparator
{
   public static function compare($email){
       $expected_user = User::where('email', $email)->first();
       if($expected_user == null) return null;

       $user_hobbies = Hobby::where('user_id','=',$expected_user->id)->first();

       $users = User::where('id', '!=', $expected_user->id)->get();
       $list = array();


       foreach ($users as $user) {

           $hobbies = $user->hobbies;

           $match = 0;

           foreach ($user_hobbies->getFillable() as  $value) {
               $match = $match + abs($hobbies->$value - $user_hobbies->$value) * 20;
           }
           $match = 100 - $match/5 ;
           $list [$user->name] = $match;


       }
       return $list;
   }
}
