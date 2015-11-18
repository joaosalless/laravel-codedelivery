<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderItemRepository;
use CodeDelivery\Models\OrderItem;
use CodeDelivery\Presenters\OrderItemPresenter;

/**
 * Class OrderItemRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderItemRepositoryEloquent extends BaseRepository implements OrderItemRepository
{
    protected $skipPresenter = true;

    public function presenter()
    {
        return OrderItemPresenter::class;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
