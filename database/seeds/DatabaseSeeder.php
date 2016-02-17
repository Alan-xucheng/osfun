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
      \App\User::create([
          'email' => 'user@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo User'
      ]);
      \App\Admin::create([
          'email' => 'admin@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo Admin'
      ]);

    }
}
