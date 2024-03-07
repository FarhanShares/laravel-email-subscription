<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\EmailNotification;
use App\Mail\PostNotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(PostCreated $event)
    {
        $post = $event->post;
        $subscribers = $post->site->subscribers;

        foreach ($subscribers as $subscriber) {
            // Check if the notification has already been sent
            $notificationExists = EmailNotification::where('post_id', $post->id)
                ->where('subscriber_id', $subscriber->id)
                ->exists();

            if (!$notificationExists) {
                // The email will be queued for sending
                Mail::to($subscriber->email)
                    ->send(new PostNotificationMail($post));

                // Record the notification
                EmailNotification::create([
                    'post_id' => $post->id,
                    'subscriber_id' => $subscriber->id,
                    'sent_at' => now(),
                    'status' => 'sent' // Assuming the email was successfully sent above
                ]);
            }
        }
    }
}
