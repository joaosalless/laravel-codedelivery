<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Models\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    public function listsStatus()
    {
        return [
            0 => 'Pendente',
            1 => 'Saiu para Entrega',
            2 => 'Entregue',
            3 => 'Cancelado'
        ];
    }

    public function getByIdAndDeliveryman($id, $userDeliverymanId)
    {
        $result = $this->with('items')->findWhere([
            'id' => $id,
            'user_deliveryman_id' => $userDeliverymanId
        ]);

        $result = $result->first();

        if ($result) {
            $result->items->each(function ($item) {
                $item->product;
            });
            return $result;
        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
