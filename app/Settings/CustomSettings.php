<?php
namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class CustomSettings extends Settings
{
    public string $app_version;
    public string $cm_title;
    public string $cm_sub_title;
    public string $address;
    public string $term;
    public string $email;
    public string $open_date_pre;
    public string $close_date_pre;
    public string $open_date_abstract;
    public string $close_date_abstract;
    public string $account_msg;
    public array $pre_registration_type;
    public array $presentation_type;
    public array $category;

    public static function group(): string
    {
        return 'custom';
    }
}
