<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Keyboard;
use App\Models\LanguageTag;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class KeyboardLayoutSeeder extends Seeder
{
    public function run(): void
    {
        // Copy profile pictures from seeders to public storage
        $this->copyProfilePicturesFromSeederToPublicStorage();

        // Get language tags
        $english = LanguageTag::where('name', 'English')->first();
        $dutch = LanguageTag::where('name', 'Dutch')->first();
        $french = LanguageTag::where('name', 'French')->first();
        $spanish = LanguageTag::where('name', 'Spanish')->first();
        $german = LanguageTag::where('name', 'German')->first();
        $danish = LanguageTag::where('name', 'Danish')->first();
        $finnish = LanguageTag::where('name', 'Finnish')->first();
        $norwegian = LanguageTag::where('name', 'Norwegian')->first();
        $swedish = LanguageTag::where('name', 'Swedish')->first();
        $czech = LanguageTag::where('name', 'Czech')->first();
        $slovak = LanguageTag::where('name', 'Slovak')->first();
        $polish = LanguageTag::where('name', 'Polish')->first();
        $italian = LanguageTag::where('name', 'Italian')->first();
        $portuguese = LanguageTag::where('name', 'Portuguese')->first();

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
        $dutchmanKeyboard->languageTags()->attach([$english->id, $dutch->id]);

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
        $stonerKeyboard->languageTags()->attach([$english->id, $dutch->id]);

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
        $qwertyKeyboard->languageTags()->attach([$english->id, $italian->id]);

        // QWERTZ Layout (German)
        $qwertzUser = User::create([
            'user_alias' => 'some_german_dude',
            'email' => 'german.dude@qwertz.de',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'German keyboard layout lover. QWERTZ is the standard layout in Germany, Austria, and Switzerland, adapted from QWERTY to better suit German language typing needs.',
        ]);

        $qwertzKeyboard = Keyboard::create([
            'name' => 'QWERTZ',
            'description' => 'The standard keyboard layout in Germany, Austria, and Switzerland. Adapted from QWERTY with Z and Y positions swapped, and optimized for German language characters and umlauts.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Z', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ö'],
                ['Y', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-'],
            ],
            'user_id' => $qwertzUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $qwertzKeyboard->languageTags()->attach([$german->id]);

        // Spanish QWERTY Layout
        $spanishQwertyUser = User::create([
            'user_alias' => 'some_spanish_dude',
            'email' => 'spanish.dude@qwerty.es',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Spanish keyboard layout enthusiast. Spanish QWERTY is adapted to include Spanish-specific characters like Ñ and easy access to accented vowels.',
        ]);

        $spanishQwertyKeyboard = Keyboard::create([
            'name' => 'Spanish QWERTY',
            'description' => 'The standard keyboard layout in Spain and Latin America. Based on QWERTY with Ñ added and optimized for Spanish language typing with easy access to accented characters.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ñ'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-'],
            ],
            'user_id' => $spanishQwertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $spanishQwertyKeyboard->languageTags()->attach([$spanish->id]);

        // Nordic QWERTY Layout
        $nordicQwertyUser = User::create([
            'user_alias' => 'some_nordic_dude',
            'email' => 'nordic.dude@qwerty.se',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Nordic keyboard layout advocate from Sweden. Nordic QWERTY is the standard layout across Scandinavia, optimized for Danish, Finnish, Norwegian, and Swedish.',
        ]);

        $nordicQwertyKeyboard = Keyboard::create([
            'name' => 'Nordic QWERTY',
            'description' => 'The standard keyboard layout in Denmark, Finland, Norway, and Sweden. Features Å, Ä, and Ö characters essential for Nordic languages.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ö'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', 'Å'],
            ],
            'user_id' => $nordicQwertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $nordicQwertyKeyboard->languageTags()->attach([$danish->id, $finnish->id, $norwegian->id, $swedish->id]);

        // Czech & Slovak QWERTZ Layout
        $czechSlovakQwertzUser = User::create([
            'user_alias' => 'some_czech_slovak_dude',
            'email' => 'cs.dude@qwertz.cz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Keyboard layout enthusiast from Czech Republic. QWERTZ is the standard layout in Czech Republic and Slovakia, adapted for Czech and Slovak special characters.',
        ]);

        $czechSlovakQwertzKeyboard = Keyboard::create([
            'name' => 'Czech & Slovak QWERTZ',
            'description' => 'The standard keyboard layout in Czech Republic and Slovakia. Based on QWERTZ with special characters optimized for Czech and Slovak typing.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Z', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ů'],
                ['Y', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-'],
            ],
            'user_id' => $czechSlovakQwertzUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $czechSlovakQwertzKeyboard->languageTags()->attach([$czech->id, $slovak->id]);

        // Polish QWERTY Layout
        $polishQwertyUser = User::create([
            'user_alias' => 'some_polish_dude',
            'email' => 'polish.dude@qwerty.pl',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Polish keyboard layout enthusiast. Polish QWERTY (also called Polish Programmers layout) is optimized for typing Polish with easy access to characters like Ą, Ć, Ę, Ł, Ń, Ó, Ś, Ź, Ż.',
        ]);

        $polishQwertyKeyboard = Keyboard::create([
            'name' => 'Polish QWERTY',
            'description' => 'The standard keyboard layout in Poland. Based on QWERTY with easy access to Polish diacritics like Ł.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ł'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-'],
            ],
            'user_id' => $polishQwertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $polishQwertyKeyboard->languageTags()->attach([$polish->id]);

        // French AZERTY Layout
        $frenchAzertyUser = User::create([
            'user_alias' => 'some_french_dude',
            'email' => 'french.dude@azerty.fr',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'French keyboard layout enthusiast. AZERTY is the standard layout in France and Belgium, specifically designed for typing French with easy access to accented characters.',
        ]);

        $frenchAzertyKeyboard = Keyboard::create([
            'name' => 'French AZERTY',
            'description' => 'The standard keyboard layout in France and Belgium. Completely different from QWERTY with A and Q swapped, Z and W swapped, optimized for French accented characters like é, è, à, ç.',
            'layout' => [
                ['A', 'Z', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['Q', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M'],
                ['W', 'X', 'C', 'V', 'B', 'N', ',', ';', ':', '!'],
            ],
            'user_id' => $frenchAzertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $frenchAzertyKeyboard->languageTags()->attach([$french->id]);

        // Portuguese QWERTY Layout
        $portugueseQwertyUser = User::create([
            'user_alias' => 'some_portuguese_dude',
            'email' => 'portuguese.dude@qwerty.pt',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'about_me' => 'Portuguese keyboard layout enthusiast from Portugal. Portuguese QWERTY is adapted for typing Portuguese with easy access to characters like Ç, and accented vowels.',
        ]);

        $portugueseQwertyKeyboard = Keyboard::create([
            'name' => 'Portuguese QWERTY',
            'description' => 'The standard keyboard layout in Portugal and Brazil. Based on QWERTY with special characters for Portuguese including Ç and accented vowels.',
            'layout' => [
                ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
                ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'Ç'],
                ['Z', 'X', 'C', 'V', 'B', 'N', 'M', ',', '.', '-'],
            ],
            'user_id' => $portugueseQwertyUser->id,
            'created_at' => now()->subDays(rand(1, 120)),
        ]);
        $portugueseQwertyKeyboard->languageTags()->attach([$portuguese->id]);

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
        $dvorakKeyboard->languageTags()->attach([$english->id, $spanish->id]);

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
        $colemakKeyboard->languageTags()->attach([$english->id, $spanish->id]);

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
        $workmanKeyboard->languageTags()->attach([$english->id]);

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
        $normanKeyboard->languageTags()->attach([$french->id]);

        // Create some random raters
        $raters = [];
        for ($i = 1; $i <= 10; $i++) {
            $raters[] = User::create([
                'user_alias' => 'user_'.$i,
                'email' => 'user'.$i.'@example.com',
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

        // QWERTZ - average ratings
        foreach (array_rand($raters, 6) as $randomRater) {
            Rating::create([
                'keyboard_id' => $qwertzKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Spanish QWERTY - average ratings
        foreach (array_rand($raters, 6) as $randomRater) {
            Rating::create([
                'keyboard_id' => $spanishQwertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Nordic QWERTY - average ratings
        foreach (array_rand($raters, 6) as $randomRater) {
            Rating::create([
                'keyboard_id' => $nordicQwertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Czech & Slovak QWERTZ - average ratings
        foreach (array_rand($raters, 5) as $randomRater) {
            Rating::create([
                'keyboard_id' => $czechSlovakQwertzKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Polish QWERTY - average ratings
        foreach (array_rand($raters, 5) as $randomRater) {
            Rating::create([
                'keyboard_id' => $polishQwertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // French AZERTY - average ratings
        foreach (array_rand($raters, 6) as $randomRater) {
            Rating::create([
                'keyboard_id' => $frenchAzertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
            ]);
        }

        // Portuguese QWERTY - average ratings
        foreach (array_rand($raters, 5) as $randomRater) {
            Rating::create([
                'keyboard_id' => $portugueseQwertyKeyboard->id,
                'user_id' => $raters[$randomRater]->id,
                'rating' => rand(3, 4),
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

        // Dutchman creator rates all layouts
        Rating::create(['keyboard_id' => $qwertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 2]);
        Rating::create(['keyboard_id' => $qwertzKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 2]);
        Rating::create(['keyboard_id' => $spanishQwertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 3]);
        Rating::create(['keyboard_id' => $nordicQwertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 3]);
        Rating::create(['keyboard_id' => $czechSlovakQwertzKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 3]);
        Rating::create(['keyboard_id' => $polishQwertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 3]);
        Rating::create(['keyboard_id' => $frenchAzertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 2]);
        Rating::create(['keyboard_id' => $portugueseQwertyKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 3]);
        Rating::create(['keyboard_id' => $dvorakKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 5]);
        Rating::create(['keyboard_id' => $colemakKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 5]);
        Rating::create(['keyboard_id' => $workmanKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 4]);
        Rating::create(['keyboard_id' => $normanKeyboard->id, 'user_id' => $dutchmanUser->id, 'rating' => 4]);

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

        // QWERTZ comments
        $date27 = now()->subDays(75);
        Comment::create([
            'keyboard_id' => $qwertzKeyboard->id,
            'user_id' => $qwertzUser->id,
            'comment' => 'The standard layout for German speakers. The Z and Y swap makes much more sense for typing German words!',
            'created_at' => $date27,
            'updated_at' => $date27,
        ]);

        $date28 = now()->subDays(40);
        Comment::create([
            'keyboard_id' => $qwertzKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'As a German native, I can\'t imagine typing on anything else. The umlauts are perfectly positioned.',
            'created_at' => $date28,
            'updated_at' => $date28,
        ]);

        $date29 = now()->subDays(12);
        Comment::create([
            'keyboard_id' => $qwertzKeyboard->id,
            'user_id' => $raters[4]->id,
            'comment' => 'Switching between QWERTY and QWERTZ is confusing at first, but QWERTZ is definitely better for German.',
            'created_at' => $date29,
            'updated_at' => $date29,
        ]);

        // Spanish QWERTY comments
        $date30 = now()->subDays(68);
        Comment::create([
            'keyboard_id' => $spanishQwertyKeyboard->id,
            'user_id' => $spanishQwertyUser->id,
            'comment' => 'The standard layout for Spanish speakers. Having Ñ and easy access to accented vowels makes typing in Spanish much more natural.',
            'created_at' => $date30,
            'updated_at' => $date30,
        ]);

        $date31 = now()->subDays(36);
        Comment::create([
            'keyboard_id' => $spanishQwertyKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'Perfect for Spanish! The Ñ key placement is so convenient. Can\'t imagine using regular QWERTY for Spanish writing.',
            'created_at' => $date31,
            'updated_at' => $date31,
        ]);

        $date32 = now()->subDays(18);
        Comment::create([
            'keyboard_id' => $spanishQwertyKeyboard->id,
            'user_id' => $raters[7]->id,
            'comment' => 'Great layout for Latin American Spanish too. Makes writing emails and documents so much faster.',
            'created_at' => $date32,
            'updated_at' => $date32,
        ]);

        // Nordic QWERTY comments
        $date33 = now()->subDays(62);
        Comment::create([
            'keyboard_id' => $nordicQwertyKeyboard->id,
            'user_id' => $nordicQwertyUser->id,
            'comment' => 'The standard layout across all Nordic countries. Having Å, Ä, and Ö readily accessible is essential for typing in Swedish, Norwegian, Finnish, and Danish!',
            'created_at' => $date33,
            'updated_at' => $date33,
        ]);

        $date34 = now()->subDays(33);
        Comment::create([
            'keyboard_id' => $nordicQwertyKeyboard->id,
            'user_id' => $raters[3]->id,
            'comment' => 'As a Swede, this layout is perfect. The Ö, Ä, Å placement feels natural and efficient.',
            'created_at' => $date34,
            'updated_at' => $date34,
        ]);

        $date35 = now()->subDays(14);
        Comment::create([
            'keyboard_id' => $nordicQwertyKeyboard->id,
            'user_id' => $raters[6]->id,
            'comment' => 'Works great for all Scandinavian languages. Switching between Swedish and Norwegian is seamless.',
            'created_at' => $date35,
            'updated_at' => $date35,
        ]);

        // Czech & Slovak QWERTZ comments
        $date36 = now()->subDays(58);
        Comment::create([
            'keyboard_id' => $czechSlovakQwertzKeyboard->id,
            'user_id' => $czechSlovakQwertzUser->id,
            'comment' => 'Perfect for Czech and Slovak! The QWERTZ base with easy access to Č, Ř, Š, Ž, and other diacritics makes typing natural.',
            'created_at' => $date36,
            'updated_at' => $date36,
        ]);

        $date37 = now()->subDays(29);
        Comment::create([
            'keyboard_id' => $czechSlovakQwertzKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Essential for Czech typing. Couldn\'t imagine using a standard QWERTY without proper diacritic support.',
            'created_at' => $date37,
            'updated_at' => $date37,
        ]);

        $date38 = now()->subDays(11);
        Comment::create([
            'keyboard_id' => $czechSlovakQwertzKeyboard->id,
            'user_id' => $raters[8]->id,
            'comment' => 'Great for both Czech and Slovak languages. The layout handles all the special characters we need.',
            'created_at' => $date38,
            'updated_at' => $date38,
        ]);

        // Polish QWERTY comments
        $date39 = now()->subDays(54);
        Comment::create([
            'keyboard_id' => $polishQwertyKeyboard->id,
            'user_id' => $polishQwertyUser->id,
            'comment' => 'The Polish Programmers layout is perfect! Easy access to all Polish diacritics like Ą, Ć, Ę, Ł, Ń, Ó, Ś, Ź, Ż while maintaining QWERTY familiarity.',
            'created_at' => $date39,
            'updated_at' => $date39,
        ]);

        $date40 = now()->subDays(27);
        Comment::create([
            'keyboard_id' => $polishQwertyKeyboard->id,
            'user_id' => $raters[4]->id,
            'comment' => 'As a Polish programmer, this layout is essential. All the special Polish characters are easily accessible.',
            'created_at' => $date40,
            'updated_at' => $date40,
        ]);

        $date41 = now()->subDays(9);
        Comment::create([
            'keyboard_id' => $polishQwertyKeyboard->id,
            'user_id' => $raters[9]->id,
            'comment' => 'Much better than the older Polish typewriter layout. Combines modern QWERTY with proper Polish character support.',
            'created_at' => $date41,
            'updated_at' => $date41,
        ]);

        // French AZERTY comments
        $date42 = now()->subDays(71);
        Comment::create([
            'keyboard_id' => $frenchAzertyKeyboard->id,
            'user_id' => $frenchAzertyUser->id,
            'comment' => 'The standard French layout. AZERTY is completely different from QWERTY but perfectly optimized for French with accents like é, è, à, ç readily available.',
            'created_at' => $date42,
            'updated_at' => $date42,
        ]);

        $date43 = now()->subDays(46);
        Comment::create([
            'keyboard_id' => $frenchAzertyKeyboard->id,
            'user_id' => $raters[2]->id,
            'comment' => 'As a French native, I can\'t imagine using anything else. The accented characters are exactly where they should be.',
            'created_at' => $date43,
            'updated_at' => $date43,
        ]);

        $date44 = now()->subDays(22);
        Comment::create([
            'keyboard_id' => $frenchAzertyKeyboard->id,
            'user_id' => $raters[5]->id,
            'comment' => 'Switching between AZERTY and QWERTY is a nightmare, but AZERTY is essential for proper French typing.',
            'created_at' => $date44,
            'updated_at' => $date44,
        ]);

        // Portuguese QWERTY comments
        $date45 = now()->subDays(66);
        Comment::create([
            'keyboard_id' => $portugueseQwertyKeyboard->id,
            'user_id' => $portugueseQwertyUser->id,
            'comment' => 'Perfect for Portuguese! Easy access to Ç and all the accented vowels we need. Works great for both European and Brazilian Portuguese.',
            'created_at' => $date45,
            'updated_at' => $date45,
        ]);

        $date46 = now()->subDays(31);
        Comment::create([
            'keyboard_id' => $portugueseQwertyKeyboard->id,
            'user_id' => $raters[7]->id,
            'comment' => 'As a Brazilian, this layout is essential. The Ç and tilde characters are exactly where they should be.',
            'created_at' => $date46,
            'updated_at' => $date46,
        ]);

        $date47 = now()->subDays(16);
        Comment::create([
            'keyboard_id' => $portugueseQwertyKeyboard->id,
            'user_id' => $raters[1]->id,
            'comment' => 'Great layout for Portuguese speakers. Much better than trying to type Portuguese on a standard US QWERTY.',
            'created_at' => $date47,
            'updated_at' => $date47,
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
        $destDir = storage_path('app/public/profile_pictures');
        // Create destination directory if it doesn't exist
        if (! File::exists($destDir)) {
            File::makeDirectory($destDir, 0755, true);
        }

        // Copy all images from source to destination
        if (File::exists($sourceDir)) {
            $files = File::files($sourceDir);
            foreach ($files as $file) {
                File::copy($file->getPathname(), $destDir.'/'.$file->getFilename());
            }
        }
    }
}
