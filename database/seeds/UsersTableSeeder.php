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
        User::create([
            'firstName' => 'Dahabu',
            'middleName' => 'Shabani',
            'surname' => 'Saidi',
            'email' => 'dahabusaidi@gmail.com',
            'phoneNumber' => '+255717495198',
            'password' => bcrypt('123456789'),
            'role' => 'Admin',
            'is_changed' => 0,
        ]);
    }
}
