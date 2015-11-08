<?php

use Illuminate\Database\Seeder;

class OAuthAppClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'id' => 'appid01',
            'secret' => sha1('secret'),
            'name' => 'Mobile App CodeDelivery - Ionic + Cordova',
        ]);
    }
}
