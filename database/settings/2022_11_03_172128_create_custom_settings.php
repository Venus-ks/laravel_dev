<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateCustomSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('custom.app_version', '2022-demo');
        $this->migrator->add('custom.cm_title', '2022 demo conference');
        $this->migrator->add('custom.cm_sub_title', '데모 서브타이틀');
        $this->migrator->add('custom.address', '마포구 서교동 마인드비');
        $this->migrator->add('custom.term', '일시: Dec 9, 2022 (Fri)');
        $this->migrator->add('custom.email', 'hjshyo@hakjisa.co.kr');
        $this->migrator->add('custom.open_date_pre', '2020-01-01');
        $this->migrator->add('custom.close_date_pre', '2120-12-31');
        $this->migrator->add('custom.open_date_abstract', '2020-01-01');
        $this->migrator->add('custom.close_date_abstract', '2120-12-31');
        $this->migrator->add('custom.account_msg', "Registration fee: <strong>Free</strong>");
        $this->migrator->add('custom.pre_registration_type', config('cm.preRegistrationType'));
        $this->migrator->add('custom.presentation_type', config('cm.presentationType'));
        $this->migrator->add('custom.category', config('cm.category'));
    }
}
