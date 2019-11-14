<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Movie extends Model
{
    protected $table = 'movie';
    protected $fillable = [
        'title',
        'author_id',
        'price',
    ];
//    public $timestamps = true;

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('title', 'asc');
    }

    public function __toString()
    {
        return $this->title;
    }
}
