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
            ['email' => 'admin@30keys.com'],
            [
                'user_alias' => 'admin',
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ]
        );
    }
}
