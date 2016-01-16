<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class DeliverymanTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */
            'name'    => $model->name,
            'email'   => $model->email,
        ];
    }
}
