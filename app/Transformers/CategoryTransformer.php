<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Category;

/**
 * Class CupomTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cupom entity
     * @param \Cupom $model
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            // 'created_at' => $model->created_at,
            // 'updated_at' => $model->updated_at
        ];
    }
}
