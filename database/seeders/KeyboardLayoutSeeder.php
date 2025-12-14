<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Keyboard;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KeyboardLayoutSeeder extends Seeder
{
    public function run(): void
    {
        // Dutchman Layout
        $dutchmanUser = User::create([
            'user_alias' => 'jesse_geelissen',
            'email' => 'jgeeliss@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $dutchmanKeyboard = Keyboard::create([
            'name' => 'Dutchman',
            'description' => 'Especially designed for Dutch and English letter frequency optimization.',
            'layout' => [
                ['/', 'L', 'R', 'W', 'X', '\'', 'F', 'U', 'O', 'Q'],
                ['S', 'T', 'N', 'D', 'M', 'P', 'H', 'E', 'A', 'I'],
                ['V', 'Z', 'J', 'G', 'C', 'B', 'K', 'Y', '.', ','],
            ],
            'user_id' => $dutchmanUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // QWERTY Layout
        $qwertyUser = User::create([
            'user_alias' => 'christopher_sholes',
            'email' => 'christopher.sholes@typewriter.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $qwertyKeyboard = Keyboard::create([
            'name' => 'QWERTY',
            'description' => 'Developed for early typewriters (Remington No.1) in the 1870s. By far the most widely used layout globally across English-speaking countries.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', ';'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '/'],
            ],
            'user_id' => $qwertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // Dvorak Simplified Keyboard
        $dvorakUser = User::create([
            'user_alias' => 'august_dvorak',
            'email' => 'august.dvorak@efficiency.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $dvorakKeyboard = Keyboard::create([
            'name' => 'Dvorak',
            'description' => 'Designed in 1936 to increase typing efficiency by placing the most used letters under the strongest fingers. Still relatively niche but one of the most widely adopted "alternative" layouts.',
            'layout' => [
                ['\'', ',', '.', 'P', 'Y', 'F', 'G', 'C', 'R', 'L'],
                ['A', 'O', 'E', 'U', 'I', 'D', 'H', 'T', 'N', 'S'],
                [';', 'Q', 'J', 'K', 'X', 'B', 'M', 'W', 'V', 'Z'],
            ],
            'user_id' => $dvorakUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // Colemak
        $colemakUser = User::create([
            'user_alias' => 'shai_coleman',
            'email' => 'shai.coleman@colemak.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $colemakKeyboard = Keyboard::create([
            'name' => 'Colemak',
            'description' => 'Created in 2006. Popular among programmers and efficiency-focused typists. Designed to minimize finger movement while keeping many QWERTY positions intact for ease of transition.',
            'layout' => [
                ['Q', 'W', 'F', 'P', 'G', 'J', 'L', 'U', 'Y', ';'],
                ['A', 'R', 'S', 'T', 'D', 'H', 'N', 'E', 'I', 'O'],
                ['Z', 'X', 'C', 'V', 'B', 'K', 'M', ',', '.', '/'],
            ],
            'user_id' => $colemakUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // Workman
        $workmanUser = User::create([
            'user_alias' => 'oj_bucao',
            'email' => 'oj.bucao@workman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $workmanKeyboard = Keyboard::create([
            'name' => 'Workman',
            'description' => 'Created in 2010-2011 as an improvement over QWERTY and Colemak, focusing on reducing lateral finger movement. Optimized for English typing but places strong emphasis on hand-alternation and minimizing awkward stretches.',
            'layout' => [
                ['Q', 'D', 'R', 'W', 'B', 'J', 'F', 'U', 'P', ';'],
                ['A', 'S', 'H', 'T', 'G', 'Y', 'N', 'E', 'O', 'I'],
                ['Z', 'X', 'M', 'C', 'V', 'K', 'L', ',', '.', '/'],
            ],
            'user_id' => $workmanUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // Norman
        $normanUser = User::create([
            'user_alias' => 'david_norman',
            'email' => 'david.norman@norman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $normanKeyboard = Keyboard::create([
            'name' => 'Norman',
            'description' => 'Created in 2010 to be a "middle ground" between QWERTY familiarity and efficiency. Keeps many common shortcuts (like Ctrl-C/V/Z positions) unchanged, making it easier to transition from QWERTY.',
            'layout' => [
                ['Q', 'W', 'D', 'F', 'K', 'J', 'U', 'R', 'L', ';'],
                ['A', 'S', 'E', 'T', 'G', 'Y', 'N', 'I', 'O', 'H'],
                ['Z', 'X', 'C', 'V', 'B', 'P', 'M', ',', '.', '/'],
            ],
            'user_id' => $normanUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
            'updated_at' => now()->subDays(rand(1, 120)),
        ]);

        // Create some random raters
        $raters = [];
        for ($i = 1; $i <= 10; $i++) {
            $raters[] = User::create([
                'user_alias' => 'user_' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);
        }

        // Add ratings to keyboards

        // Dutchman - obviously well-liked by all!
        foreach (array_rand($raters, 7) as $randomRater) {
            Rating::create([
                'keyboard_id' => $dutchmanKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(4, 5),
            ]);
        }

        // QWERTY - average ratings
        foreach (array_rand($raters, 7) as $randomRater) {
            Rating::create([
                'keyboard_id' => $qwertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(2, 4),
            ]);
        }

        // Dvorak - some good, some bad
        foreach (array_rand($raters, 6) as $randomRater) {
            Rating::create([
                'keyboard_id' => $dvorakKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(1, 2) == 1 ? rand(1, 2) : rand(4, 5),
            ]);
        }

        // Colemak - generally well-liked
        foreach (array_rand($raters, 8) as $randomRater) {
            Rating::create([
                'keyboard_id' => $colemakKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 5),
            ]);
        }

        // Workman - moderate ratings
        foreach (array_rand($raters, 5) as $randomRater) {
            Rating::create([
                'keyboard_id' => $workmanKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Norman - fewer ratings, mixed
        foreach (array_rand($raters, 4) as $randomRater) {
            Rating::create([
                'keyboard_id' => $normanKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(2, 4),
            ]);
        }

        // Create comments on keyboards

        // Dutchman comments
        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'This layout is optimized for Dutch and English. The home row contains the most frequent letters in both languages!',
            'created_at' => now()->subDays(60),
        ]);

        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $raters[0]->id,
            'comment' => 'Really loving the flow of this layout. My fingers barely move from the home row.',
            'created_at' => now()->subDays(45),
        ]);

        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'As a Dutch speaker, this feels natural. The vowel placement is genius!',
            'created_at' => now()->subDays(30),
        ]);

        // QWERTY comments
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $qwertyUser->id,
            'comment' => 'The original and still the standard. Designed to prevent typewriter jams, not for efficiency.',
            'created_at' => now()->subDays(80),
        ]);

        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'It\'s what everyone knows, but honestly there are better options out there.',
            'created_at' => now()->subDays(50),
        ]);

        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[3]->id,
            'comment' => 'Not the most efficient, but muscle memory is hard to break. Switching would take months.',
            'created_at' => now()->subDays(35),
        ]);

        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Works fine for casual typing. Don\'t see a reason to change after 20 years.',
            'created_at' => now()->subDays(20),
        ]);

        // Dvorak comments
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $dvorakUser->id,
            'comment' => 'Scientifically designed to minimize finger movement and maximize typing speed. The vowels on the left home row are key.',
            'created_at' => now()->subDays(90),
        ]);

        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[0]->id,
            'comment' => 'Took me 3 months to learn but now I\'m typing 20 WPM faster than on QWERTY!',
            'created_at' => now()->subDays(55),
        ]);

        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[4]->id,
            'comment' => 'The learning curve is steep. Been at it for 2 weeks and still struggling with common words.',
            'created_at' => now()->subDays(15),
        ]);

        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[6]->id,
            'comment' => 'Interesting concept but the punctuation placement feels awkward for programming.',
            'created_at' => now()->subDays(42),
        ]);

        // Colemak comments
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $colemakUser->id,
            'comment' => 'A modern approach that keeps QWERTY shortcuts intact. Best of both worlds!',
            'created_at' => now()->subDays(75),
        ]);

        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'Perfect for programmers. Much easier to learn than Dvorak since many keys stay in place.',
            'created_at' => now()->subDays(50),
        ]);

        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'The ZXCV positions staying the same makes copy/paste so much easier during the transition.',
            'created_at' => now()->subDays(40),
        ]);

        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[7]->id,
            'comment' => 'Switched from QWERTY last month. Already feeling more comfortable and less finger strain.',
            'created_at' => now()->subDays(28),
        ]);

        // Workman comments
        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $workmanUser->id,
            'comment' => 'Designed with biomechanics in mind. Reduces lateral finger movement compared to other layouts.',
            'created_at' => now()->subDays(85),
        ]);

        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $raters[3]->id,
            'comment' => 'The hand alternation is really smooth. My RSI symptoms have improved significantly.',
            'created_at' => now()->subDays(48),
        ]);

        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $raters[8]->id,
            'comment' => 'Good layout but not as popular as Colemak. Harder to find resources and support.',
            'created_at' => now()->subDays(25),
        ]);

        // Norman comments
        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $normanUser->id,
            'comment' => 'The easiest alternative layout to learn. Only changes 14 keys from QWERTY!',
            'created_at' => now()->subDays(70),
        ]);

        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Nice middle ground. Not as efficient as Colemak but way easier to transition to.',
            'created_at' => now()->subDays(38),
        ]);

        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $raters[9]->id,
            'comment' => 'Been using it for a week and already at 70% of my QWERTY speed. Impressive!',
            'created_at' => now()->subDays(7),
        ]);
    }
}
