<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'scheduled_at' => 'datetime',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
