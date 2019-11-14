<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $movie_id
 * @property int|null $quantity
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCustomerId($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereMovieId($value)
 * @method static Builder|Order whereQuantity($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id','movie_id','quantity','price'];
    protected $dates = ['created_at','updated_at'];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
