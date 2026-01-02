<?php

namespace Database\Seeders;

use App\Models\Newsitem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class NewsitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copy newsitems pictures from seeders to public storage
        $this->copyNewsPicturesFromSeederToPublicStorage();
        Newsitem::create([
            'title' => 'Welcome to 30keys!',
            'body' => 'We are excited to announce the launch of 30keys, your new destination for exploring and rating different keyboard layouts. Whether you\'re a QWERTY loyalist or a Dvorak enthusiast, this is the place to share your experiences and discover new layouts.',
            'created_at' => now()->subDays(20),
            'image' => 'news_pictures/welcome.jpg',
        ]);

        Newsitem::create([
            'title' => 'New Rating System Released',
            'body' => 'You can now rate keyboard layouts and share your opinions with the community. Help others find the perfect layout by leaving detailed reviews and ratings based on your personal experience.',
            'created_at' => now()->subDays(17),
            'image' => 'news_pictures/rating_system.avif',
        ]);

        Newsitem::create([
            'title' => 'Community Milestone: 100 Layouts',
            'body' => 'We\'ve reached an amazing milestone with over 100 keyboard layouts now listed on our platform! From traditional layouts to experimental designs, our community continues to grow. Thank you to all our contributors!',
            'created_at' => now()->subDays(15),
            'image' => 'news_pictures/100.jpg',
        ]);

        Newsitem::create([
            'title' => 'Profile Customization Now Available',
            'body' => 'You can now personalize your profile with a custom username, profile picture, birthday, and an "about me" section. Show off your personality and let others in the community get to know you better!',
            'created_at' => now()->subDays(8),
            'image' => 'news_pictures/profile_customization.jpg',
        ]);

        Newsitem::create([
            'title' => 'Tips for Switching Keyboard Layouts',
            'body' => 'Thinking about trying a new keyboard layout? Here are some tips: start slowly, practice regularly, use typing tutors, don\'t give up after the first week, and remember that it typically takes 2-4 weeks to become comfortable with a new layout. Happy typing!',
            'created_at' => now()->subDays(3),
            'image' => 'news_pictures/switch_keyboard_layout.jpg',
        ]);
    }

    /**
     * Copy newsitems pictures from seeders directory to public storage
     */
    private function copyNewsPicturesFromSeederToPublicStorage(): void
    {
        $sourceDir = database_path('seeders/news_pictures');
        $destDir = storage_path('app/public/news_pictures');
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
