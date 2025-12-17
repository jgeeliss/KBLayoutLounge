<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@ehb.be'],
            [
                'user_alias' => 'admin',
                'password' => Hash::make('Password!321'),
                'is_admin' => true,
                'about_me' => 'Administrator of this keyboard layout community. Feel free to reach out if you have any questions!',
            ]
        );
    }
}
