<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'id' => 1,
            'username' => 'dawn大海',
            'mail' => 'oogai@dawn.co.jp',
            'password' => Hash::make('0706'),
            'bio' => 'Play the base!',
            'images' => '/dawnSNS/public/images/dawn.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nothashpassword' => '0706'
        ],
        [
            'id' => 2,
            'username' => 'dawn小出',
            'mail' => 'koide@dawn.co.jp',
            'password' => Hash::make('0203'),
            'bio' => 'Play the guitar!',
            'images' => '/dawnSNS/public/images/dawn.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nothashpassword' => '0203'
        ],
        [
            'id' => 3,
            'username' => 'dawn富永',
            'mail' => 'tominaga@dawn.co.jp',
            'password' => Hash::make('0000'),
            'bio' => 'Play the guitar and base!',
            'images' => '/dawnSNS/public/images/dawn.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nothashpassword' => '0000'
        ],
        [
            'id' => 4,
            'username' => 'dawn伊藤',
            'mail' => 'itou@dawn.co.jp',
            'password' => Hash::make('0101'),
            'bio' => 'Play the drum!',
            'images' => '/dawnSNS/public/images/dawn.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'nothashpassword' => '0101'
        ]
            ]);
    }
}
