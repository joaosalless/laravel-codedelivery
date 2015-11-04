<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'client_id',
        'user_deliveryman_id',
        'total',
        'status'
    ];

    protected $with = ['deliveryman'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected $appends = ['subtotal'];

    public function getSubtotalAttribute()
    {
        return $this->attributes['subtotal'] = number_format($this->items->sum('totals'), 2, '.', '.');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function deliveryman()
    {
        return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function isDeletable()
    {
        if (($this->status == 3) && (empty($this->items))) {
            return true;
        }

        return false;
    }
}
