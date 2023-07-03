<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = config('cm.adminInitiate.id');
        $admin->email = config('cm.adminInitiate.email');
        $admin->password = bcrypt(config('cm.adminInitiate.pw'));
        $admin->save();
    }
}
