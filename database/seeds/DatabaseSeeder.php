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
      \App\User::create([
          'email' => 'user2@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo User2'
      ]);
         \App\User::create([
          'email' => 'user3@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo User3'
      ]);
      \App\Admin::create([
          'email' => 'admin@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo Admin'
      ]);
      \App\Category::create([
          'slug' => 'collocation',
          'name' => '搭配',
          'parent' => '0'
      ],[
          'slug' =>'clothing',
          'name' =>'服装',
          'parent' => 1

      ],[
          'slug' =>'ornament',
          'name' =>'饰品',
          'parent' =>1

      ]);
      \App\Category::create([
          'slug' => 'beauty',
          'name' => '美妆',
          'parent' => '0'
      ]);
      \App\Category::create([
          'slug' => 'news',
          'name' => '新闻',
          'parent' => '0'
      ]);
      \App\Category::create([
          'slug' => 'sing',
          'name' => '唱歌',
          'parent' => '0'
      ]);
      \App\Category::create([
          'slug' => 'dance',
          'name' => '舞蹈',
          'parent' => '0'
      ]);
      \App\Category::create([
          'slug' => 'dance',
          'name' => '舞蹈',
          'parent' => '0'
      ]);
      \App\Category::create([
          'slug' => 'topic',
          'name' => '话题',
          'parent' => '0'
      ]);


    }
}
