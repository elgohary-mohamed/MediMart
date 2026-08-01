<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use Illuminate\Support\Str;
class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $sections = [
        'Best Deals',
        'Featured Products',
        'Pharmaceutical Department',
        'New Arrivals',
    ];

    foreach ($sections as $section) {

        Section::firstOrCreate(
            ['slug' => Str::slug($section)],
            [
                'name' => $section,
            ]
        );
    }
}
}
