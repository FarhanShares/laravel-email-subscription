<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // A Post belongs to a Site
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    // Get the email notifications associated with the post.
    public function emailNotifications()
    {
        return $this->hasMany(EmailNotification::class, 'post_id');
    }
}
