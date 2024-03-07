<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adding 3 subscribers for each site
        Site::all()->each(function ($site) {
            Subscriber::factory()->count(3)->create(['site_id' => $site->id]);
        });
    }
}
