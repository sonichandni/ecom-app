<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            ['name'     => "Mobiles"],
            ['name'     => "Fashion"],
            ['name'     => "Electronics"],
            ['name'     => "Home"]
        ]);
    }
}
