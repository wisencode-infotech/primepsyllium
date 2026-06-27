<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        EmailTemplate::query()->firstOrCreate(
            ['slug' => EmailTemplate::CONTACT_INQUIRY_SLUG],
            [
                'name' => 'Contact Form Notification',
                'subject' => 'New Contact Inquiry from {{name}}',
                'body' => <<<'HTML'
                    <p>You've received a new inquiry from the website contact form.</p>
                    <p>
                        <strong>Name:</strong> {{name}}<br>
                        <strong>Company:</strong> {{company}}<br>
                        <strong>Email:</strong> {{email}}<br>
                        <strong>Product Interest:</strong> {{product_interest}}<br>
                        <strong>Submitted:</strong> {{submitted_at}}
                    </p>
                    <p><strong>Message:</strong><br>{{message}}</p>
                    HTML,
                'is_active' => true,
            ]
        );
    }
}
