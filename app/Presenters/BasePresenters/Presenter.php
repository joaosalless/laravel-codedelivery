<?php

namespace CodeDelivery\Presenters\BasePresenters;

use Laracasts\Presenter\Presenter as BasePresenter;
use Carbon\Carbon;

class Presenter extends BasePresenter
{
    public function getCreatedAt()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    public function getCreatedAtDate()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function getCreatedAtTime()
    {
        return Carbon::parse($this->created_at)->format('H:i:s');
    }

    public function getUpdatedAt()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtDate()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y');
    }

    public function getUpdatedAtTime()
    {
        return Carbon::parse($this->updated_at)->format('H:i:s');
    }
}
