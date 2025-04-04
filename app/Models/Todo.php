<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Add readable cyrillic text for is completed field
     */
    public function getIsCompletedReadableAttribute(): string
    {
        return $this->is_completed ? 'Да' : 'Нет';
    }
}
