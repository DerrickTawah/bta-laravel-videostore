<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $created_at
 * @method static Builder|Customer newModelQuery()
 * @method static Builder|Customer newQuery()
 * @method static Builder|Customer query()
 * @method static Builder|Customer whereCreatedAt($value)
 * @method static Builder|Customer whereEmail($value)
 * @method static Builder|Customer whereId($value)
 * @method static Builder|Customer whereName($value)
 * @mixin Eloquent
 */
class Customer extends Model
{
    protected $table    = 'customer';
    protected $fillable = ['name','email'];
    protected $dates    = ['created_at','updated_at'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
