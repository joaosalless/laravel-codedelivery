<?php

namespace CodeDelivery\Presenters;

use CodeDelivery\Transformers\CategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryPresenter
 *
 * @package namespace CodeDelivery\Presenters;
 */
class CategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryTransformer();
    }
}
