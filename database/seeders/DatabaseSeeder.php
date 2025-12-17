<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'user_alias' => 'test_user',
            'email' => 'test@example.com',
            'about_me' => 'Just a test user exploring different keyboard layouts and sharing my typing journey!',
        ]);

        // Seed some famous keyboard layouts with their creators
        $this->call(KeyboardLayoutSeeder::class);
        // Seed an admin user
        $this->call(AdminUserSeeder::class);
    }
}
