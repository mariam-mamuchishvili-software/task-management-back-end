<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Developer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'status',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
