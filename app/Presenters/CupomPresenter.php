<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CupomTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CupomPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CupomPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CupomTransformer();
    }
}
