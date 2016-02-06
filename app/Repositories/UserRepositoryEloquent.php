<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Models\User;
use CodeDelivery\Presenters\UserPresenter;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    protected $skipPresenter = true;

    public function presenter()
    {
        return UserPresenter::class;
    }

    public function lists()
    {
        return $this->model->lists('name', 'id');
    }

    public function listsDeliveryman()
    {
        return $this->model->where('role', '=', 'deliveryman')->lists('name', 'id');
    }

    public function listsRoles()
    {
        return [
            'client' => 'Cliente',
            'deliveryman' => 'Entregador',
            'admin' => 'Administrador',
        ];
    }

    public function updateDeviceToken($id, $deviceToken)
    {
        $model = $this->model->find($id);
        $model->device_token = $deviceToken;
        $model->save();
        return $this->parserResult($model);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
