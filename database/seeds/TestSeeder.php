<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstname' => 'Al',
            'lastname' => 'Radjilul',
            'email' => 'admin@fin.test',
            'phone' => '09000000000',
            'password' => Hash::make('password?'),
            'admin' => 1,
            'email_verified_at' => '2019-01-30 16:00:00',
        ]);
    }
}
