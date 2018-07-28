<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // \App\User::insert([
        //     'name' => 'Administrator',
        //     'email' => 'admin@email.com',
        //     'password' => bcrypt('111111'),
        //     'level' => 0,
        //     'flag' => 1,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        Eloquent::unguard();
        $path = public_path('vendor/db_indonesia.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Table Wilayah seeded!');
    }
}
