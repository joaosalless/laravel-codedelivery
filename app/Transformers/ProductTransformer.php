<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Product;

/**
 * Class ProductTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model) {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */
            'name' => $model->name,
            'price' => $model->price,

            // 'created_at' => $model->created_at,
            // 'updated_at' => $model->updated_at
        ];
    }
}
