<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'developer_id',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
