<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use CodeDelivery\Presenters\BasePresenters\OrderItemPresenter;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

    use PresentableTrait;
    protected $presenter = OrderItemPresenter::class;

    protected $fillable = [
        'product_id',
        'order_id',
        'price',
        'qtd'
    ];

    protected $appends = ['totals'];

    public function getTotalsAttribute()
    {
        return $this->attributes['totals'] = number_format(($this->price * $this->qtd), 2, '.', '.');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
