<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cupom extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'code',
        'value'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isDeletable()
    {
        if (!empty($this->orders)) {
            return false;
        }

        if ($this->used < 1) {
            return true;
        }

        return false;
    }
}
