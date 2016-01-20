<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Cupom;

/**
 * Class CupomTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class CupomTransformer extends TransformerAbstract
{
    /**
     * Transform the \Cupom entity
     * @param \Cupom $model
     *
     * @return array
     */
    public function transform(Cupom $model)
    {
        return [
            'id'         => (int) $model->id,
            'code'       => (int) $model->code,
            'value'      => (float) $model->value,
            'qrcode'     => base64_encode($model->getQrcode()),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
