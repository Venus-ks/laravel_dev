<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;
use App\Models\Submit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Lecture::factory(10)->create();
        // Submit::factory(30)->create();
        $this->call(UserAdminTableSeeder::class);
    }
}
