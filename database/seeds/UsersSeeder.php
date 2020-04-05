<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@project.test',
            'password' => bcrypt('global'),
            'confirmed' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator Project',
            'paterno' => 'Admin Projecct',
            'email' => 'admin_project@project.test',
            'password' => bcrypt('project'),
            'confirmed' => 1
        ]);
    }
}
