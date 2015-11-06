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
            'name' => 'Usuário Entragador 1',
            'email' => 'entregador1@user.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman'
        ]);

        factory(User::class)->create([
            'name' => 'Usuário Entragador 2',
            'email' => 'entregador2@user.com',
            'password' => bcrypt(123456),
            'role' => 'deliveryman'
        ]);

        factory(User::class)->create([
            'name' => 'Usuário Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt(123456),
            'role' => 'admin'
        ])->client()->save(factory(Client::class)->make());

        factory(User::class)->create([
            'name' => 'Usuário Cliente',
            'email' => 'user@user.com',
            'password' => bcrypt(123456),
        ])->client()->save(factory(Client::class)->make());

        factory(User::class, 10)->create([
            'password' => bcrypt(123456)
        ])->each(function ($c) {
            $c->client()->save(factory(Client::class)->make());
        });
    }
}
