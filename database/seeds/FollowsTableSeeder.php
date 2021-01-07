<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            [
                'id' => 1,
                'follow' => 4,
                'follower' => 2,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'follow' => 1,
                'follower' => 3,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'follow' => 2,
                'follower' => 4,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'follow' => 1,
                'follower' => 3,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
