<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = file_get_contents('items.json','/');
        $items = json_decode($items);

        foreach ($items as $item) {
            Item::create([
                'name' => $item->name,
                'price' => intval($item->price),
                'info' => $item->item_description,
                'image' => $item->image,
                'images' => json_encode([$item->image,$item->image]),
                'category_id' => intval($item->category_id)
            ]);
        }
    }
}
