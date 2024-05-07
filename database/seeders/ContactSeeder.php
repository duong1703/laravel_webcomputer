<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '1234567890',
                'subject' => 'Hello',
                'message' => 'This is a test message.',
            ],
            // Add more sample data as needed
        ];

        
        foreach ($contacts as $contactData) {
            Contact::create($contactData);
        }

    }
}
