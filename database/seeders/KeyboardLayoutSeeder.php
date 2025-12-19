<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Keyboard;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class KeyboardLayoutSeeder extends Seeder
{
    public function run(): void
    {
        // Copy profile pictures from seeders to public storage
        $this->copyProfilePicturesFromSeederToPublicStorage();
        // Dutchman Layout
        $dutchmanUser = User::create([
            'user_alias' => 'jesse_geelissen',
            'email' => 'jgeeliss@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Keyboard layout enthusiast from Belgium. Creator of the Dutchman layout, optimized for Dutch and English typing. Always experimenting with new designs!',
            'profile_picture' => 'profile_pictures/jesse_geelissen.jpg',
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
        ]);

        $stonerKeyboard = Keyboard::create([
            'name' => 'Stoner',
            'description' => 'My first try at designing a layout for Dutch and English.',
            'layout' => [
                ['B', 'G', 'L', 'M', 'X', '\'', 'K', 'U', 'O', 'Y'],
                ['S', 'T', 'N', 'R', 'W', 'P', 'D', 'E', 'A', 'I'],
                ['V', 'C', 'Z', 'J', 'Q', 'F', 'H', '.', ',', '/'],
            ],
            'user_id' => $dutchmanUser->id,
            'created_at' => now()->subDays(rand(120, 240)),
        ]);

        // QWERTY Layout
        $qwertyUser = User::create([
            'user_alias' => 'christopher_sholes',
            'email' => 'christopher.sholes@typewriter.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Inventor and typewriter pioneer. Created the QWERTY layout in the 1870s to prevent mechanical jamming. Little did I know it would become the global standard!',
            'profile_picture' => 'profile_pictures/christopher_sholes.jpg',
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
        ]);

        // Dvorak Simplified Keyboard
        $dvorakUser = User::create([
            'user_alias' => 'august_dvorak',
            'email' => 'august.dvorak@efficiency.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Educational psychologist and professor. Designed the Dvorak Simplified Keyboard in 1936 to maximize typing efficiency. Passionate about ergonomics and reducing finger strain.',
            'profile_picture' => 'profile_pictures/august_dvorak.jpg',
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
        ]);

        // Colemak
        $colemakUser = User::create([
            'user_alias' => 'shai_coleman',
            'email' => 'shai.coleman@colemak.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Software developer and layout designer. Created Colemak in 2006 as a modern alternative to QWERTY, balancing efficiency with ease of learning. Open source advocate.',
            'profile_picture' => 'profile_pictures/shai_coleman.jpg',
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
        ]);

        // Workman
        $workmanUser = User::create([
            'user_alias' => 'oj_bucao',
            'email' => 'oj.bucao@workman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Engineer and ergonomics enthusiast. Developed the Workman layout between 2010-2011 to reduce lateral finger movement. Focused on hand alternation and comfort for long typing sessions.',
            'profile_picture' => 'profile_pictures/oj_bucao.jpg',
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
        ]);

        // Norman
        $normanUser = User::create([
            'user_alias' => 'david_norman',
            'email' => 'david.norman@norman.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Software engineer and keyboard layout designer. Created the Norman layout in 2010 to provide a balanced alternative between QWERTY familiarity and typing efficiency. Advocate for ergonomic typing solutions.',
            'profile_picture' => 'profile_pictures/david_norman.png',
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

        // Stoner - well-liked by all, not as much as Dutchman
        foreach (array_rand($raters, 7) as $randomRater) {
            Rating::create([
                'keyboard_id' => $stonerKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
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
        $date1 = now()->subDays(60);
        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'This layout is optimized for Dutch and English. The home row contains the most frequent letters in both languages!',
            'created_at' => $date1,
            'updated_at' => $date1,
        ]);

        $date2 = now()->subDays(45);
        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $raters[0]->id,
            'comment' => 'Really loving the flow of this layout. My fingers barely move from the home row.',
            'created_at' => $date2,
            'updated_at' => $date2,
        ]);

        $date3 = now()->subDays(30);
        Comment::create([
            'keyboard_id' => $dutchmanKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'As a Dutch speaker, this feels natural. The vowel placement is genius!',
            'created_at' => $date3,
            'updated_at' => $date3,
        ]);

        // Stoner comments
        $date1 = now()->subDays(60);
        Comment::create([
            'keyboard_id' => $stonerKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'My first try at creating a layout optimized for Dutch and English, be gentle!',
            'created_at' => $date1,
            'updated_at' => $date1,
        ]);

        $date2 = now()->subDays(45);
        Comment::create([
            'keyboard_id' => $stonerKeyboard->id,
            'user_id' => $raters[0]->id,
            'comment' => 'Weird layout but has potential. Needs some tweaks for better ergonomics.',
            'created_at' => $date2,
            'updated_at' => $date2,
        ]);

        $date3 = now()->subDays(30);
        Comment::create([
            'keyboard_id' => $stonerKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'Not bad for a first attempt! I can see the thought process behind the key placements.',
            'created_at' => $date3,
            'updated_at' => $date3,
        ]);

        // QWERTY comments
        $date4 = now()->subDays(80);
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $qwertyUser->id,
            'comment' => 'The original and still the standard. Designed to prevent typewriter jams, not for efficiency.',
            'created_at' => $date4,
            'updated_at' => $date4,
        ]);

        $date5 = now()->subDays(50);
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'It\'s what everyone knows, but honestly there are better options out there.',
            'created_at' => $date5,
            'updated_at' => $date5,
        ]);

        $date6 = now()->subDays(35);
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[3]->id,
            'comment' => 'Not the most efficient, but muscle memory is hard to break. Switching would take months.',
            'created_at' => $date6,
            'updated_at' => $date6,
        ]);

        $date7 = now()->subDays(20);
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Works fine for casual typing. Don\'t see a reason to change after 20 years.',
            'created_at' => $date7,
            'updated_at' => $date7,
        ]);

        // Dvorak comments
        $date8 = now()->subDays(90);
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $dvorakUser->id,
            'comment' => 'Scientifically designed to minimize finger movement and maximize typing speed. The vowels on the left home row are key.',
            'created_at' => $date8,
            'updated_at' => $date8,
        ]);

        $date9 = now()->subDays(55);
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[0]->id,
            'comment' => 'Took me 3 months to learn but now I\'m typing 20 WPM faster than on QWERTY!',
            'created_at' => $date9,
            'updated_at' => $date9,
        ]);

        $date10 = now()->subDays(15);
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[4]->id,
            'comment' => 'The learning curve is steep. Been at it for 2 weeks and still struggling with common words.',
            'created_at' => $date10,
            'updated_at' => $date10,
        ]);

        $date11 = now()->subDays(42);
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $raters[6]->id,
            'comment' => 'Interesting concept but the punctuation placement feels awkward for programming.',
            'created_at' => $date11,
            'updated_at' => $date11,
        ]);

        // Colemak comments
        $date12 = now()->subDays(75);
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $colemakUser->id,
            'comment' => 'A modern approach that keeps QWERTY shortcuts intact. Best of both worlds!',
            'created_at' => $date12,
            'updated_at' => $date12,
        ]);

        $date13 = now()->subDays(50);
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'Perfect for programmers. Much easier to learn than Dvorak since many keys stay in place.',
            'created_at' => $date13,
            'updated_at' => $date13,
        ]);

        $date14 = now()->subDays(40);
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'The ZXCV positions staying the same makes copy/paste so much easier during the transition.',
            'created_at' => $date14,
            'updated_at' => $date14,
        ]);

        $date15 = now()->subDays(28);
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $raters[7]->id,
            'comment' => 'Switched from QWERTY last month. Already feeling more comfortable and less finger strain.',
            'created_at' => $date15,
            'updated_at' => $date15,
        ]);

        // Workman comments
        $date16 = now()->subDays(85);
        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $workmanUser->id,
            'comment' => 'Designed with biomechanics in mind. Reduces lateral finger movement compared to other layouts.',
            'created_at' => $date16,
            'updated_at' => $date16,
        ]);

        $date17 = now()->subDays(48);
        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $raters[3]->id,
            'comment' => 'The hand alternation is really smooth. My RSI symptoms have improved significantly.',
            'created_at' => $date17,
            'updated_at' => $date17,
        ]);

        $date18 = now()->subDays(25);
        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $raters[8]->id,
            'comment' => 'Good layout but not as popular as Colemak. Harder to find resources and support.',
            'created_at' => $date18,
            'updated_at' => $date18,
        ]);

        // Norman comments
        $date19 = now()->subDays(70);
        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $normanUser->id,
            'comment' => 'The easiest alternative layout to learn. Only changes 14 keys from QWERTY!',
            'created_at' => $date19,
            'updated_at' => $date19,
        ]);

        $date20 = now()->subDays(38);
        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Nice middle ground. Not as efficient as Colemak but way easier to transition to.',
            'created_at' => $date20,
            'updated_at' => $date20,
        ]);

        $date21 = now()->subDays(7);
        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $raters[9]->id,
            'comment' => 'Been using it for a week and already at 70% of my QWERTY speed. Impressive!',
            'created_at' => $date21,
            'updated_at' => $date21,
        ]);

        // My own comments on other layouts
        $date22 = now()->subDays(65);
        Comment::create([
            'keyboard_id' => $qwertyKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'Used this for most of my life before starting my search for a better layout. It\'s not optimized for efficiency, but there\'s something to be said for the universal standard.',
            'created_at' => $date22,
            'updated_at' => $date22,
        ]);

        $date23 = now()->subDays(52);
        Comment::create([
            'keyboard_id' => $dvorakKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'Dvorak was a huge inspiration for my own Dutchman layout. The vowel placement on the home row is brilliant. I borrowed some concepts but optimized for Dutch frequency.',
            'created_at' => $date23,
            'updated_at' => $date23,
        ]);

        $date24 = now()->subDays(44);
        Comment::create([
            'keyboard_id' => $colemakKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'Really solid layout! The fact that it keeps ZXCV in place is genius for keyboard shortcuts. If I weren\'t so invested in my own design, I\'d probably use this.',
            'created_at' => $date24,
            'updated_at' => $date24,
        ]);

        $date25 = now()->subDays(33);
        Comment::create([
            'keyboard_id' => $workmanKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'The biomechanical approach is fascinating. Workman definitely reduces lateral movement. Great for preventing RSI!',
            'created_at' => $date25,
            'updated_at' => $date25,
        ]);

        $date26 = now()->subDays(18);
        Comment::create([
            'keyboard_id' => $normanKeyboard->id,
            'user_id' => $dutchmanUser->id,
            'comment' => 'Norman is underrated! Perfect for people who want better efficiency without the learning curve of Dvorak or Colemak. Would definitely recommend this as a first alternative layout.',
            'created_at' => $date26,
            'updated_at' => $date26,
        ]);
    }

    /**
     * Copy profile pictures from seeders directory to public storage
     */
    private function copyProfilePicturesFromSeederToPublicStorage(): void
    {
        $sourceDir = database_path('seeders/profile_pictures');
        $destDir = public_path('storage/profile_pictures');

        // Create destination directory if it doesn't exist
        if (!File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        // Copy all images from source to destination
        if (File::exists($sourceDir)) {
            $files = File::files($sourceDir);
            foreach ($files as $file) {
                File::copy($file->getPathname(), $destDir . '/' . $file->getFilename());
            }
        }
    }
}
