<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\OrderItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrderItemPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class OrderItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrderItemTransformer();
    }
}
