<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming each Site will have 10 Posts
        Site::all()->each(function ($site) {
            Post::factory()->count(10)->create(['site_id' => $site->id]);
        });
    }
}
