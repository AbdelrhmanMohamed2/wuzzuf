<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const CATEGORIES  = [
        'general',
        'hero',
        'services',
        'social_links',
        'footer',
    ];
    const CREATE_ALLOWED = [
        'main_cards' => 'hero',
        'sub_cards' => 'hero',
        'service' => 'services',
        'social_link' => 'social_links',
    ];

    public static function ROLES($key)
    {
        $roles = [
            'site_logo' => [
                'image' => 'required|file|image|mimes:jpeg,png,jpg',
            ],
            'general' => [
                'value' => 'required|string',
            ],
            'main_cards' => [
                'icon' => 'required|string',
                'name' => 'required|string',
                'number' => 'required|string',
            ],
            'sub_cards' => [
                'icon' => 'required|string',
                'name' => 'required|string',
                'description' => 'required|string',
            ],
            'service' => [
                'icon' => 'required|string',
                'name' => 'required|string',
                'description' => 'required|string',
            ],
            'social_link' => [
                'icon' => 'required|string',
                'link' => 'required|string',
            ],
        ];

        return $roles[$key] ?? $roles['general'];
    }

    protected $fillable = [
        'key',
        'value',
        'category'
    ];
}
