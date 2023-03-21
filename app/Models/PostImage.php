<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function post(): BelongsTo
    {
        return $this->belongsTo('App\Models\BlogPost', 'blog_post_id');
    }
}
