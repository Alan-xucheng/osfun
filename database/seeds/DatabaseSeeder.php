<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Model::unguard();

      $this->call(UserTableSeeder::class);
      $this->call(AdminTableSeeder::class);
      $this->call(CategoryTableSeeder::class);

      Model::reguard();



        // $this->call(UserTableSeeder::class);


    }
}

class UserTableSeeder extends Seeder{

  public function run(){

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
  }
}  

class AdminTableSeeder extends Seeder{

  public function run(){

      \App\Admin::create([
          'email' => 'admin@qq.com',
          'password' => crypt('123123'),
          'name' => 'Demo Admin'
      ]);
  }
}

class CategoryTableSeeder extends Seeder{

  public function run(){

      DB::table('categories')->delete();
      $group = \App\Category::create(['slug'=>'group','name'=>'圈子分类']);
         $Category = \App\Category::create(['slug'=>'Guildrecruitment','name'=>'公会招募','parent'=>$group->id]); 
         $Category = \App\Category::create(['slug'=>'game','name'=>'游戏','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'star','name'=>'明星','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'hobby','name'=>'爱好','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'acg','name'=>'动漫','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'location','name'=>'地区','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'sports','name'=>'体育','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'Bodybuilding','name'=>'运动健身','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'beauty','name'=>'美女','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'constellation','name'=>'星座','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'travel','name'=>'旅行','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'pet','name'=>'宠物','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'diet','name'=>'饮食','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'web','name'=>'互联网','parent'=>$group->id]);
         $Category = \App\Category::create(['slug'=>'gossip','name'=>'闲聊','parent'=>$group->id]);
        

      $academy = \App\Category::create(['slug'=>'academy','name'=>'学院分类']);


        $Category = \App\Category::create(['slug'=>'collocation','name'=>'搭配','parent'=>$academy->id]);

          \App\Category::create(['slug'=>'clothing','name'=>'服装','parent'=>$Category->id]);
          \App\Category::create(['slug'=>'ornament','name'=>'饰品','parent'=>$Category->id]);

        $Category = \App\Category::create(['slug'=>'beauty','name'=>'美妆','parent'=>$academy->id]);

        $Category = \App\Category::create(['slug'=>'news','name'=>'新闻','parent'=>$academy->id]);  

        $Category = \App\Category::create(['slug'=>'sing','name'=>'唱歌','parent'=>$academy->id]); 

        $Category = \App\Category::create(['slug'=>'dance','name'=>'舞蹈','parent'=>$academy->id]);  

        $Category = \App\Category::create(['slug'=>'topic','name'=>'话题','parent'=>$academy->id]);

        $Category = \App\Category::create(['slug'=>'photography','name'=>'摄影','parent'=>$academy->id]);  

        $Category = \App\Category::create(['slug'=>'video_recording','name'=>'视频','parent'=>$academy->id]); 


      $service = \App\Category::create(['slug'=>'service','name'=>'服务分类']); 
      
        $Category = \App\Category::create(['slug'=>'spread','name'=>'推广','parent'=>$service->id]); 

          \App\Category::create(['slug'=>'webspread','name'=>'网络推广','parent'=>$Category->id]); 
          \App\Category::create(['slug'=>'mobilespread','name'=>'移动端推广','parent'=>$Category->id]); 

        $Category = \App\Category::create(['slug'=>'collocation','name'=>'服饰搭配','parent'=>$service->id]); 

        $Category = \App\Category::create(['slug'=>'beauty','name'=>'美妆','parent'=>$service->id]); 

        $Category = \App\Category::create(['slug'=>'video','name'=>'视频','parent'=>$service->id]); 

        $Category = \App\Category::create(['slug'=>'photo','name'=>'摄影','parent'=>$service->id]);

        $Category = \App\Category::create(['slug'=>'space','name'=>'场地租赁','parent'=>$service->id]);




  }
}
























