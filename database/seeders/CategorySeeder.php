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
            ['name' => 'phone', 'icon' => 'phone','created_at' => now()],
            ['name' => 'tablet', 'icon' => 'tablet','created_at' => now()],
            ['name' => 'watch', 'icon' => 'clock','created_at' => now()],
            ['name' => 'laptop', 'icon' => 'laptop','created_at' => now()],
            ['name' => 'earbuds', 'icon' => 'headphones','created_at' => now()]
        ];

        DB::table('categories')->insert($categories);
    }
}
