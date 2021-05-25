<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Shop;
use App\Models\ShopMessage;
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
        Category::factory(10)->create();
        Article::factory(50)->create();
        Shop::factory(10)->create();
        ShopMessage::factory(500)->create();
    }
}
