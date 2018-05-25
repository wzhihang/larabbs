<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;
use App\Models\User;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        //所有用户 ID 数组
        $user_ids = User::all()->pluck('id')->toArray();

        //所有分类 ID 数组
        $cate_ids = \App\Models\Category::all()->pluck('id')->toArray();

        //获取faker实例
        $faker = app(Faker\Generator::class);

        $topics = factory(Topic::class)->times(200)->make()->each(function ($topic, $index) use ($faker,$user_ids,$cate_ids) {

            //从所有用户ID中随机取一个并赋值
            $topic->user_id = $faker->randomElement($user_ids);

            //从所有分类ID中随机取一个并赋值
            $topic->category_id = $faker->randomElement($cate_ids);
        });

        Topic::insert($topics->toArray());
    }

}

