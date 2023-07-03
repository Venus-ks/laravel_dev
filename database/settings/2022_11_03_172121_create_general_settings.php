<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.institute', '학회명');
        $this->migrator->add('general.site_active', FALSE);
        $this->migrator->add('general.admin_email', 'qna@hakjisa.co.kr');
        $this->migrator->add('general.admin_pw', '1234');
        $this->migrator->add('general.card_type',config('cm.cardType'));
    }
}
