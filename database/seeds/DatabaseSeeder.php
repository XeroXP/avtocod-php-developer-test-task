<?php

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->times(\mt_rand(1, 5))->create();
	factory(Message::class)->times(\mt_rand(5, 10))->create();
    }
}
