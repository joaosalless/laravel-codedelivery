<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Models\Product;
use CodeDelivery\Presenters\ProductPresenter;

/**
 * Class ProductRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    protected $skipPresenter = true;

    public function presenter()
    {
        return ProductPresenter::class;
    }

    public function lists()
    {
        return $this->model->lists('name', 'id');
    }

    /**
     * Fields utilizadas na busca
     */
    protected $fieldSearchable = [
        'name'=>'like',
        'description' => 'like',
        'price' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
