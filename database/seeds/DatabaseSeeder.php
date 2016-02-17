<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        \App\Admin::create({
        	'email'=>'admin@qq.com',
        	'password'=>crypt('123123'),
        	'name'=>'admin'
        });
        \App\User::create({
        	'email'=>'user@qq.com',
        	'password'=>crypt('123123'),
        	'name'=>'user'
        })
    }
}
