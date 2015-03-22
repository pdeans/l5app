<?php

use Illuminate\Database\Seeder;
use App\User as User;

class UserTableSeeder extends Seeder {
    public function run() {
        User::truncate();

        // Add first user
        User::create([
            'name'     => 'Test One',
            'email'    => 'jsarda@mcclainconcepts.com',
            'password' => 'LaravelTestPW'
        ]);

        // Add second user
        User::create([
            'name'     => 'Test Two',
            'email'    => 'your@emailaddress.com',
            'password' => 'LaravelTestPW'
        ]);
    }
}