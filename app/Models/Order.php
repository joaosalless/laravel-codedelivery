<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use CodeDelivery\Models\Cupom;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'client_id',
        'cupom_id',
        'user_deliveryman_id',
        'total',
        'status'
    ];

    protected $with = [
        'client',
        'cupom',
        'deliveryman',
        'items'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected $appends = ['subtotal'];

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

    public function cupom()
    {
        return $this->belongsTo(Cupom::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->attributes['subtotal'] = number_format($this->items->sum('totals'), 2, '.', '');
    }

    public function isDeletable()
    {
        if (($this->status == 3) && (empty($this->items))) {
            return true;
        }

        return false;
    }
}
