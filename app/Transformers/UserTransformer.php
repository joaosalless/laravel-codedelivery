<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\User;

/**
 * Class ClientTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    // protected $defaultIncludes =   ['client'];
    protected $availableIncludes = ['client'];

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'      => (int)$model->id,
            'name'    => $model->name,
            'email'   => $model->email,
            'role'    => $model->role,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeClient(User $model)
    {
        if ($model->client) {
            return $this->item($model->client, new ClientTransformer());
        } else {
            return null;
        }
    }
}
