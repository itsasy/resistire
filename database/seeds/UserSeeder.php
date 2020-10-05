<?php

use App\Models\tb_users;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(tb_users::class)->times(10)->create();
    }
}
