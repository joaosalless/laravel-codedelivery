<?php

use CodeDelivery\Models\User;
use CodeDelivery\Models\Client;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt(123456),
            'role' => 'admin'
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'email' => 'entregador@user.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman'
        ]);

        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class, 10)->create()->each(function($c) {
            $c->client()->save(factory(Client::class)->make());
        });
    }
}
