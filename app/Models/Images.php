<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Images
 *
 * @property int $id
 * @property int $movie_id
 * @property string $image
 * @method static Builder|Images newModelQuery()
 * @method static Builder|Images newQuery()
 * @method static Builder|Images query()
 * @method static Builder|Images whereId($value)
 * @method static Builder|Images whereImage($value)
 * @method static Builder|Images whereMovieId($value)
 * @mixin Eloquent
 */
class Images extends Model
{
    protected $table = 'images';

    public $timestamps = false;
}
