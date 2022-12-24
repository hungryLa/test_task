<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\News;
use App\Models\User;
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
        User::factory(3)->create();
        News::factory(10)->create();
        Comment::factory(50)->create();
    }
}
