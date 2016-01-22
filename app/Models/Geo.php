<?php

namespace CodeDelivery\Models;

use Illuminate\Contracts\Support\Jsonable;

class Geo implements Jsonable
{
    public $lat;
    public $long;

    public function toJson($option = 0)
    {
        return json_encode([
            'lat'  => $this->lat,
            'long' => $this->long,
        ]);
    }
}
