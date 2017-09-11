<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Message::create([
           'message' => 'Hello everyone here!',
           'user_id' => 1
        ]);

        App\Message::create([
           'message' => 'Thanks so much!',
           'user_id' => 2
        ]);
    }
}
