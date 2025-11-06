<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactForm;

class ContactMessageSeeder extends Seeder
{
      public function run(): void
    {
        ContactForm::create([
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'subject' => 'Sponsorship Inquiry',
            'message' => 'I would like to learn more about sponsorship opportunities.'
        ]);
    }
}