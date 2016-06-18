<?php

use CodeDelivery\Models\Order;
use CodeDelivery\Models\Cupom;
use CodeDelivery\Models\Client;
use CodeDelivery\Models\Product;
use CodeDelivery\Models\OrderItem;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 200)->create()->each(function ($o) {

            $client = $o->client;
            $cupom  = Cupom::find(rand(1, 10));

            for ($i = 0; $i <= 2; $i++) {
                $product = Product::find(rand(1, 5));

                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id' => $product->id,
                    'qtd' => rand(1, 5),
                    'price' => $product->price
                ]));
            }

            if ($cupom->used == 0) {
                $o->cupom_id = $cupom->id;
                $o->total = ($o->items->sum('totals') - $cupom->value) + $o->shipping;

                $cupom->used = 1;
                $cupom->used_at = new Carbon();
                $cupom->save();
            } else {
                $o->total = $o->items->sum('totals') + $o->shipping;
            }

            $o->client_id = $client->id;

            $o->save();
        });
    }
}
