<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Users\User::class, 5)->create()->each(function ($user) {
            factory(App\Hobbies\Hobby::class,1)->create(['user_id' => $user->id]);
        });
    }
}
