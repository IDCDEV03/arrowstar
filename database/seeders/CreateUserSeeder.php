<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'member_name' => 'ผู้ดูแลระบบ',
                'email' => 'arrowstartravel114@gmail.com',
                'is_admin' => '1',
                'password' => 'arrow114'
            ],
            [
                'member_name' => 'ผู้ใช้',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => '1234'
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
