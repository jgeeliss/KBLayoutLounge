<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beginner = FaqCategory::where('name', 'Beginner')->first()->id;
        $moderate = FaqCategory::where('name', 'Moderate')->first()->id;
        $expert = FaqCategory::where('name', 'Expert')->first()->id;

        Faq::create([
            'faq_category_id' => $beginner,
            'question' => 'What is 30keys?',
            'answer' => '30keys is a platform dedicated to exploring and sharing information about various keyboard layouts, typing techniques, and related topics.',
        ]);
        Faq::create([
            'faq_category_id' => $beginner,
            'question' => 'How can I contribute to 30keys?',
            'answer' => 'You can contribute by submitting new keyboard layouts, writing reviews, sharing typing tips, and participating in community discussions.',
        ]);
        Faq::create([
            'faq_category_id' => $beginner,
            'question' => 'Is 30keys free to use?',
            'answer' => 'Yes, 30keys is completely free to use for all users.',
        ]);
        Faq::create([
            'faq_category_id' => $moderate,
            'question' => 'Can I suggest new features for 30keys?',
            'answer' => 'Absolutely! We welcome feedback and suggestions from our community. You can contact us through the feedback form on our website.',
        ]);
        Faq::create([
            'faq_category_id' => $moderate,
            'question' => 'How are keyboard layouts rated on 30keys?',
            'answer' => 'Keyboard layouts are rated based solely on user reviews, 30keys does not influence ratings in any way.',
        ]);
        Faq::create([
            'faq_category_id' => $moderate,
            'question' => 'What typing techniques are recommended for beginners?',
            'answer' => 'For beginners, we recommend starting with touch typing, practicing regularly, and using typing tutor software to build speed and accuracy.',
        ]);
        Faq::create([
            'faq_category_id' => $expert,
            'question' => 'How do homerow mods work?',
            'answer' => 'Home-row mods (HRMs) are a keyboard customization where keys on your home row (like ASDF JKL;) act as normal letters when tapped but transform into modifier keys (Ctrl, Alt, Shift, Super/Win) when held down, eliminating finger movement for shortcuts and making them more ergonomic.',
        ]);
        Faq::create([
            'faq_category_id' => $expert,
            'question' => 'What are the benefits of using alternative keyboard layouts?',
            'answer' => 'Alternative keyboard layouts can improve typing speed, reduce finger movement, and decrease the risk of repetitive strain injuries by optimizing key placement based on letter frequency and ergonomics.',
        ]);
        Faq::create([
            'faq_category_id' => $expert,
            'question' => 'How can I create my own keyboard layout?',
            'answer' => 'Creating your own keyboard layout involves researching key placement, using keyboard layout design software, and testing your layout extensively to ensure it meets your typing needs and preferences.',
        ]);
    }
}
