<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'role_id'=>'2',
            'is_active'=>'1',
            'name'=>'Tester',
            'email'=>'tester@codingfaculty.com',
            'password'=>bcrypt('123')


        ]);
    }
}
