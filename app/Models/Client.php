<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use CodeDelivery\Presenters\BasePresenters\ClientPresenter;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    use PresentableTrait;
    protected $presenter = ClientPresenter::class;

    // protected $with = ['user'];

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isDeletable()
    {
        return false;
    }
}
