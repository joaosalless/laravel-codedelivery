<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Models\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
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
