<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'level' => 1,
            ],
            [
                'name' => 'waiter',
                'email' => 'waiter@gmail.com',
                'password' => bcrypt('waiter123'),
                'level' => 2,
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('kasir123'),
                'level' => 3,
            ],
            [
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'password' => bcrypt('owner123'),
                'level' => 4,
            ]
        ];

        User::insert($data);
    }
}
