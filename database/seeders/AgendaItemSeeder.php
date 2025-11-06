<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AgendaItemSeeder extends Seeder
{
    public function run(): void
    {
        Agenda::create([
            'title' => 'Opening Ceremony',
            'description' => 'Welcome remarks and keynote address.',
            'speaker' => 'Dr. Ahmed Al-Harthy',
            'start_time' => '09:00',
            'end_time' => '09:45',
            'day' => 'Day 1'
        ]);

        Agenda::create([
            'title' => 'Panel Discussion: Hydrogen Future',
            'description' => 'Panel with international experts on hydrogen technology.',
            'speaker' => 'Jane Doe',
            'start_time' => '10:00',
            'end_time' => '11:30',
            'day' => 'Day 1'
        ]);
    }
}