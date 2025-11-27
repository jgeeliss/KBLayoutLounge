<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KeyboardLayoutSeeder extends Seeder
{
    public function run(): void
    {
        // QWERTY Layout
        $qwertyUser = User::create([
            'user_alias' => 'christopher_sholes',
            'email' => 'christopher.sholes@typewriter.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Keyboard::create([
            'name' => 'QWERTY',
            'description' => 'Developed for early typewriters (Remington No.1) in the 1870s. By far the most widely used layout globally across English-speaking countries.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', ';'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '/']
            ],
            'user_id' => $qwertyUser->id,
        ]);

        // Dvorak Simplified Keyboard
        $dvorakUser = User::create([
            'user_alias' => 'august_dvorak',
            'email' => 'august.dvorak@efficiency.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Keyboard::create([
            'name' => 'Dvorak Simplified Keyboard',
            'description' => 'Designed in 1936 to increase typing efficiency by placing the most used letters under the strongest fingers. Still relatively niche but one of the most widely adopted "alternative" layouts.',
            'layout' => [
                ['\'', ',', '.', 'P', 'Y', 'F', 'G', 'C', 'R', 'L'],
                ['A', 'O', 'E', 'U', 'I', 'D', 'H', 'T', 'N', 'S'],
                [';', 'Q', 'J', 'K', 'X', 'B', 'M', 'W', 'V', 'Z']
            ],
            'user_id' => $dvorakUser->id,
        ]);

        // Colemak
        $colemakUser = User::create([
            'user_alias' => 'shai_coleman',
            'email' => 'shai.coleman@colemak.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Keyboard::create([
            'name' => 'Colemak',
            'description' => 'Created in 2006. Popular among programmers and efficiency-focused typists. Designed to minimize finger movement while keeping many QWERTY positions intact for ease of transition.',
            'layout' => [
                ['Q', 'W', 'F', 'P', 'G', 'J', 'L', 'U', 'Y', ';'],
                ['A', 'R', 'S', 'T', 'D', 'H', 'N', 'E', 'I', 'O'],
                ['Z', 'X', 'C', 'V', 'B', 'K', 'M', ',', '.', '/']
            ],
            'user_id' => $colemakUser->id,
        ]);

        // Workman
        $workmanUser = User::create([
            'user_alias' => 'oj_bucao',
            'email' => 'oj.bucao@workman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Keyboard::create([
            'name' => 'Workman',
            'description' => 'Created in 2010-2011 as an improvement over QWERTY and Colemak, focusing on reducing lateral finger movement. Optimized for English typing but places strong emphasis on hand-alternation and minimizing awkward stretches.',
            'layout' => [
                ['Q', 'D', 'R', 'W', 'B', 'J', 'F', 'U', 'P', ';'],
                ['A', 'S', 'H', 'T', 'G', 'Y', 'N', 'E', 'O', 'I'],
                ['Z', 'X', 'M', 'C', 'V', 'K', 'L', ',', '.', '/']
            ],
            'user_id' => $workmanUser->id,
        ]);

        // Norman
        $normanUser = User::create([
            'user_alias' => 'david_norman',
            'email' => 'david.norman@norman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Keyboard::create([
            'name' => 'Norman',
            'description' => 'Created in 2010 to be a "middle ground" between QWERTY familiarity and efficiency. Keeps many common shortcuts (like Ctrl-C/V/Z positions) unchanged, making it easier to transition from QWERTY.',
            'layout' => [
                ['Q', 'W', 'D', 'F', 'K', 'J', 'U', 'R', 'L', ';'],
                ['A', 'S', 'E', 'T', 'G', 'Y', 'N', 'I', 'O', 'H'],
                ['Z', 'X', 'C', 'V', 'B', 'P', 'M', ',', '.', '/']
            ],
            'user_id' => $normanUser->id,
        ]);
    }
}
