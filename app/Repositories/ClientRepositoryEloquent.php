<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Models\Client;
use CodeDelivery\Presenters\ClientPresenter;

/**
 * Class ClientRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    protected $skipPresenter = true;

    public function presenter()
    {
        return ClientPresenter::class;
    }

    /**
     * Fields utilizadas na busca
     */
    protected $fieldSearchable = [
        'phone'=>'like',
        'address'=>'like',
        'zipcode'=>'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
