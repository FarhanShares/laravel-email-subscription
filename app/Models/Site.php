<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    use HasFactory;

    // Sites have many Posts
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Sites have many Subscribers
    public function subscribers(): HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
