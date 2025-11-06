<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        Page::create([
            'title' => 'About the Event',
            'slug' => 'about',
            'content' => 'Green Hydrogen Summit Oman brings together industry leaders and experts...',
            'language' => 'en'
        ]);

        Page::create([
            'title' => 'Contact Us',
            'slug' => 'contact',
            'content' => 'For inquiries, please email info@greenhydrogensummitoman.com',
            'language' => 'en'
        ]);
    }   
}