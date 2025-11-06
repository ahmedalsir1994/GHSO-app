<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    public function run(): void
    {
        Sponsor::create([
            'name' => 'OQ',
            'logo' => 'sponsors/oq.png',
            'website' => 'https://oq.com',
            'category' => 'Platinum'
        ]);

        Sponsor::create([
            'name' => 'PDO',
            'logo' => 'sponsors/pdo.png',
            'website' => 'https://pdo.co.om',
            'category' => 'Gold'
        ]);
    }
}