<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
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
        DB::table('users')->insert([
            'name'  => 'ADMIN',
            'email'     => 'administrador@admin.com',
            'password'  => bcrypt('admin'),
            'current_team_id' => 1,
        ]);

        DB::table('teams')->insert([
            'user_id'  => 1,
            'name'     => "admin's Team",
            'personal_team'  => 1,
        ]);
    }
}
