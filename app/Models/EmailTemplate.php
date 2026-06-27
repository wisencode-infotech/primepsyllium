<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    public const CONTACT_INQUIRY_SLUG = 'contact-inquiry';

    /**
     * Placeholders available for substitution, keyed by token, valued by description.
     *
     * @var array<string, string>
     */
    public const PLACEHOLDERS = [
        '{{name}}' => "Visitor's full name",
        '{{company}}' => "Visitor's company name",
        '{{email}}' => "Visitor's email address",
        '{{product_interest}}' => 'Product the visitor is interested in',
        '{{message}}' => 'Message submitted by the visitor',
        '{{submitted_at}}' => 'Date and time the form was submitted',
    ];

    protected $fillable = [
        'name',
        'slug',
        'subject',
        'body',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Replace placeholder tokens in the subject/body with the given values.
     *
     * @param  array<string, string>  $data
     * @return array{subject: string, body: string}
     */
    public function render(array $data): array
    {
        return [
            'subject' => strtr($this->subject, $data),
            'body' => strtr($this->body, $data),
        ];
    }
}
