<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            'name' => 'Customer',
            'desc' =>'The customers makes payment and make orders',
        ]);

        DB::table('roles')->insert([
            'name' => 'Admin',
            'desc' =>'The admin takes orders and fulfill customers request',
        ]);

        DB::table('roles')->insert([
            'name' => 'SuperAdmin',
            'desc' =>'The Superadmin monitors every activities on the site',
        ]);

        DB::table('roles')->insert([
            'name' => 'TechAdmin',
            'desc' =>'The Techadmin monitors every activities on the site and the admins',
        ]);
    }
}
