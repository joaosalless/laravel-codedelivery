<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use CodeDelivery\Presenters\BasePresenters\ProductPresenter;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
    use TransformableTrait;

    use PresentableTrait;
    protected $presenter = ProductPresenter::class;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function isDeletable()
    {
        if (empty($this->orders)) {
            return true;
        }

        return false;
    }
}
