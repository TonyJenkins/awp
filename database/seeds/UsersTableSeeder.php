<?php

use App\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run () {

        factory (User::class, 20) -> create ();

    }
}
