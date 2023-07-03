<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $institute;
    public bool $site_active;
    public string $admin_email;
    public string $admin_pw;
    public array $card_type;

    public static function group(): string
    {
        return 'general';
    }
}
