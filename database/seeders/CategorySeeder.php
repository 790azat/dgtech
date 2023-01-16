<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'phone', 'icon' => 'phone'],
            ['name' => 'tablet', 'icon' => 'tablet'],
            ['name' => 'watch', 'icon' => 'clock'],
            ['name' => 'laptop', 'icon' => 'laptop'],
            ['name' => 'earbuds', 'icon' => 'headphones']
        ];

        DB::table('categories')->insert($categories);
    }
}
