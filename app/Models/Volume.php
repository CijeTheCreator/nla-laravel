<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Volume extends Model
{
    /** @use HasFactory<\Database\Factories\VolumeFactory> */
    use HasFactory;

    protected $fillable = ['name', 'date', 'isCurrent'];

    protected $casts = ['isCurrent' => 'boolean'];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
