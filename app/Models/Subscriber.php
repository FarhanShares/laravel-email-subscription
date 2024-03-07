<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends Model
{
    use HasFactory;

    // A Subscriber belongs to a Site
    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
