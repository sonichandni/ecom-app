<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sub_categories')->insert([
            [
                'category_id'=> 2,
                'name'     => "Men's Wear"
            ],
            [
                'category_id'=> 2,
                'name'     => "Women's Wear"
            ],
            [
                'category_id'=> 3,
                'name'     => "Gaming"
            ],
            [
                'category_id'=> 3,
                'name'     => "Laptop"
            ],
            [
                'category_id'=> 3,
                'name'     => "Storage"
            ],
            [
                'category_id'=> 3,
                'name'     => "Powerbank"
            ],
        ]);
    }
}
