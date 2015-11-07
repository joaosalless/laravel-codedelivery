<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Client;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model) {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */
            'name'    => $model->user->name,
            'email'   => $model->user->email,
            'phone'   => $model->phone,
            'user_id' => $model->user_id,
            'address' => $model->address,
            'city'    => $model->city,
            'state'   => $model->state,
            'zipcode' => $model->zipcode,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
