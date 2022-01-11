<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$yop4S5D.k6fWJD3/7KGW6uzwrT4ojIbHyWxR3M.bz7Z76E2kXw/Lm',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
