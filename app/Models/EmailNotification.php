<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailNotification extends Model
{
    protected $fillable = ['post_id', 'subscriber_id', 'sent_at', 'status'];

    // Get the post associated with the email notification.
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // Get the subscriber associated with the email notification.
    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }
}
