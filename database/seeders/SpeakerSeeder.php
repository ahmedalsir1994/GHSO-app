<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    public function run(): void
    {
        Speaker::create([
            'name' => 'Dr. Ahmed Al-Harthy',
            'title' => 'Energy Expert',
            'organization' => 'Oman Hydrogen Center',
            'photo' => 'speakers/ahmed.jpg',
            'bio' => 'Dr. Ahmed is a leading expert in hydrogen technologies.',
        ]);

        Speaker::create([
            'name' => 'Jane Doe',
            'title' => 'CEO',
            'organization' => 'Clean Energy Ltd.',
            'photo' => 'speakers/jane.jpg',
            'bio' => 'Jane has over 15 years of experience in renewable energy.',
        ]);
    }
}