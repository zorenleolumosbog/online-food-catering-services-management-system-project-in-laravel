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
        DB::table('admins')->truncate();

        // insert 3 users
        DB::table('admins')->insert([
                'admin_name'=>'Juan Delacruz',
                'admin_email'=>'juan@gmail.com',
                'admin_password'=> bcrypt('12345'),
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
    }
}
