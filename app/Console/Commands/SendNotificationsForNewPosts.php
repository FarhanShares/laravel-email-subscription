<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Events\PostCreated;
use Illuminate\Console\Command;

class SendNotificationsForNewPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:notify-new';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications for all new posts to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $newPosts = Post::whereNull('notified_at')->get();

        foreach ($newPosts as $post) {
            PostCreated::dispatch($post);
            $post->notified_at = now();
            $post->save();
        }
    }
}
