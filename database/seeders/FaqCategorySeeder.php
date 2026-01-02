<?php

namespace Database\Seeders;

use App\Models\FaqCategory;
use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqCategory::create(['name' => 'Beginner', 'order' => 1]);
        FaqCategory::create(['name' => 'Moderate',  'order' => 2]);
        FaqCategory::create(['name' => 'Expert', 'order' => 3]);
    }
}
