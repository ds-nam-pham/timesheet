<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (\App::isLocal()) {
            User::create(
                [
                    'name' => 'admin',
                    'email' => 'admin@dimage.co.jp',
                    'password' => 'admage',
                    'avatar' => 'null',
                    'description' => 'test data'
                ]
            );

            // Create mockup admin accounts.
            User::factory()->count(20)->create();
        }
    }
}
