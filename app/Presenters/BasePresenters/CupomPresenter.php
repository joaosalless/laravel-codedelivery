<?php

namespace CodeDelivery\Presenters\BasePresenters;

use CodeDelivery\Presenters\BasePresenters\Presenter;
use JansenFelipe\Utils\Utils as Utils;
use Carbon\Carbon;

class CupomPresenter extends Presenter
{
    public function getValue($moeda = true, $currency = 'R$', $decimal = 2)
    {
        return $moeda ? Utils::moeda($this->value, $currency, $decimal) : $this->value;
    }

    public function getQrcode($size = 100, $format = 'svg', $margin = 0)
    {
        return QrCode::size($size)->margin($margin)->generate($this->code);
    }

    public function getUsed()
    {
        return $this->used > 0 ? 'Sim' : 'Não';
    }

    public function getUsedAt()
    {
        return Carbon::parse($this->used_at)->format('d/m/Y H:i:s');
    }

    public function getUsedByClientId()
    {
        if ($this->used > 0) {
            return $this->orders->first()->client->id;
        }
    }

    public function getUsedByClientName()
    {
        if ($this->used > 0) {
            return $this->orders->first()->client->user->name;
        }
    }
}
