<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Presenters\OrderPresenter;
use CodeDelivery\Models\Order;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    protected $skipPresenter = true;

    /**
     * Fields utilizadas na busca
     */
    protected $fieldSearchable = [
        'id'       => 'like',
        'cupom_id' => 'like',
        'total'    => 'like'
    ];

    public function listsStatus()
    {
        return [
            0 => 'Pendente',
            1 => 'Saiu para Entrega',
            2 => 'Entregue',
            3 => 'Cancelado'
        ];
    }

    public function getByIdAndClient($id, $idClient)
    {
        $result = $this->model
            ->where('id', $id)
            ->where('client_id', $idClient)
            ->first();

        if ($result) {
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException())->setModel($this->model());
    }

    public function getByIdAndDeliveryman($id, $userDeliverymanId)
    {
        $result = $this->model
            ->where('id', $id)
            ->where('user_deliveryman_id', $userDeliverymanId)
            ->first();

        if ($result) {
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException())->setModel($this->model());
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

    public function presenter()
    {
        return OrderPresenter::class;
    }
}
