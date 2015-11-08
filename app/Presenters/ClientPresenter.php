<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClientPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class ClientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}
