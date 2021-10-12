<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(12)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Tag::factory (100)->create();

        $this->call(PostTagTableSeeder::class);
        $this->command->info('Таблица пост-тег загружена данными!');

        $this->call(TagsTableSeeder::class);
        $this->command->info('Таблица тегов загружена данными!');
    }
}
