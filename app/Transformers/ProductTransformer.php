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
    protected $defaultIncludes = ['category'];

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model) {
        return [
            'id'          => (int)$model->id,
            'name'        => $model->present()->getName(),
            'description' => $model->description,
            'price'       => $model->price,
            'image'       => $model->present()->getImage(160, 160),

            'created_at'  => $model->created_at,
            'updated_at'  => $model->updated_at
        ];
    }

    public function includeCategory(Product $model)
    {
        return $this->item($model->category, new CategoryTransformer());
    }
}
