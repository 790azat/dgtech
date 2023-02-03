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

        $ps = '["https:\/\/media.gamestop.com\/i\/gamestop\/11206959?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/10067176-680826cd?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11179565\/Forspoken---PlayStation-5?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11203515?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/20003155-640dc21d?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11206901-11206901?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11206962-11206961?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11206859-11206849?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11190739?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11206876?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/10099653-2e0ec255?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/20003155-2e0ec255?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/20002357-640dc21d?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11148586\/Elden-Ring----PlayStation-5?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/20001322-680826cd?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/20002357-2e0ec255?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11204091?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/10132184-360e9255?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11204168-11204169?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11206861-11206861?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11118328\/Ratchet-and-Clank-Rift-Apart---PlayStation-5?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11208650\/Gotham-Knights---PlayStation-5?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11162003\/Gran-Turismo-7---PlayStation-5?$plp-tile3x$","https:\/\/media.gamestop.com\/i\/gamestop\/11105660\/FAR-CRY-6---PlayStation-5?$plp-tile3x$"]';
            foreach (json_decode($ps) as $p) {
                Item::create([
                    'name' => 'The Last of Us Part',
                    'price' => 35000,
                    'info' => 'In a ravaged civilization, where infected and hardened survivors run rampant',
                    'image' => $p,
                    'images' => json_encode([$p,$p]),
                    'category_id' => 6
                ]);
            }

        $tv = '["https:\/\/microless.com\/cdn\/products\/f1858f636406a84c1bdae0440b102278-md.jpg","https:\/\/microless.com\/cdn\/products\/22b431f497f5a0c170c097a4c39e90e6-md.jpg","https:\/\/microless.com\/cdn\/products\/2ff56c04895d52899706ce233ecd0935-md.jpg","https:\/\/microless.com\/cdn\/products\/cf51d2876ebc8f167b3971e90e960fe9-md.jpg","https:\/\/microless.com\/cdn\/products\/397180efc743d1ffb165eeaa6f8dc53e-md.jpg","https:\/\/microless.com\/cdn\/products\/6e0a03c793c30659ca98edb76a26366c-md.jpg","https:\/\/microless.com\/cdn\/products\/e7d967db2c14ae8d9e5b9d64612f13c0-md.jpg","https:\/\/microless.com\/cdn\/products\/99f8573dbf12cf97ff47ca1abef860ec-md.jpg","https:\/\/microless.com\/cdn\/products\/ee48a58de77f23d005c19a4182f19e36-md.jpg","https:\/\/microless.com\/cdn\/products\/f226c26ddd476e122c39698a9c861416-md.jpg","https:\/\/microless.com\/cdn\/products\/691d12fd0521eda10cfe008dc843af23-md.jpg","https:\/\/microless.com\/cdn\/products\/45c08814807be32c16113cc816c57679-md.jpg","https:\/\/microless.com\/cdn\/products\/4b1ac10e2a2282a256f7c1c632c00aae-md.jpg","https:\/\/microless.com\/cdn\/products\/f226c26ddd476e122c39698a9c861416-md.jpg","https:\/\/microless.com\/cdn\/products\/d3bc9109045636a4c94d1d9a718f486d-md.jpg","https:\/\/microless.com\/cdn\/products\/f69377b85f035d65ea02a00115e737e2-md.jpg","https:\/\/microless.com\/cdn\/products\/3cc2906aaf7e3986364faac328f371e7-md.jpg","https:\/\/microless.com\/cdn\/products\/d684834560649e6bed586f30150a412f-md.jpg","https:\/\/microless.com\/cdn\/products\/c3d447c188254e7b24dcfcc0e4641bf3-md.jpg","https:\/\/microless.com\/cdn\/products\/83ef4c62b929e2630e4f9c4eb019e1fe-md.jpg","https:\/\/microless.com\/cdn\/products\/6cf9e6e7b162f96001c4f5660d17e9b3-md.jpg","https:\/\/microless.com\/cdn\/products\/99f8573dbf12cf97ff47ca1abef860ec-md.jpg","https:\/\/microless.com\/cdn\/products\/dea221d82cbbb2d75250eb350866d365-md.jpg","https:\/\/microless.com\/cdn\/products\/050653851b465b8bec8b147b6d6e75c8-md.jpg","https:\/\/microless.com\/cdn\/products\/2ff56c04895d52899706ce233ecd0935-md.jpg","https:\/\/microless.com\/cdn\/products\/a59db6f3fc3267231d7b9ab63aac8ad5-md.jpg","https:\/\/microless.com\/cdn\/products\/9c1734d6464488f063c126b60d1c2d51-md.jpg","https:\/\/microless.com\/cdn\/products\/910c44e8269f295efbb5273e787a38b7-md.jpg","https:\/\/microless.com\/cdn\/products\/a5e877de116d525bf717a4ff1f1dc1dd-md.jpg","https:\/\/microless.com\/cdn\/products\/d27b68647e8187ad0759a3e56cd65598-md.jpg","https:\/\/microless.com\/cdn\/products\/6e5caff30a2a18db734619602ba2f15d-md.jpg","https:\/\/microless.com\/cdn\/products\/4fbd793e5ee0c8e70b291f04ddef535d-md.jpg","https:\/\/microless.com\/cdn\/products\/050653851b465b8bec8b147b6d6e75c8-md.jpg","https:\/\/microless.com\/cdn\/products\/6f73759b5ae83e3ccdcc6faeca651ce9-md.jpg","https:\/\/microless.com\/cdn\/products\/f031a984181c1103f86e7866fa6b67ce-md.jpg","https:\/\/microless.com\/cdn\/products\/41d90ad2de278a64e4950977107b7135-md.jpg","https:\/\/microless.com\/cdn\/products\/f1858f636406a84c1bdae0440b102278-md.jpg","https:\/\/microless.com\/cdn\/products\/22b431f497f5a0c170c097a4c39e90e6-md.jpg","https:\/\/microless.com\/cdn\/products\/2ff56c04895d52899706ce233ecd0935-md.jpg","https:\/\/microless.com\/cdn\/products\/cf51d2876ebc8f167b3971e90e960fe9-md.jpg","https:\/\/microless.com\/cdn\/products\/397180efc743d1ffb165eeaa6f8dc53e-md.jpg","https:\/\/microless.com\/cdn\/products\/6e0a03c793c30659ca98edb76a26366c-md.jpg","https:\/\/microless.com\/cdn\/products\/f226c26ddd476e122c39698a9c861416-md.jpg","https:\/\/microless.com\/cdn\/products\/99f8573dbf12cf97ff47ca1abef860ec-md.jpg","https:\/\/microless.com\/cdn\/products\/e7d967db2c14ae8d9e5b9d64612f13c0-md.jpg","https:\/\/microless.com\/cdn\/products\/ee48a58de77f23d005c19a4182f19e36-md.jpg","https:\/\/microless.com\/cdn\/products\/a59db6f3fc3267231d7b9ab63aac8ad5-md.jpg","https:\/\/microless.com\/cdn\/products\/9c1734d6464488f063c126b60d1c2d51-md.jpg","https:\/\/microless.com\/cdn\/products\/910c44e8269f295efbb5273e787a38b7-md.jpg","https:\/\/microless.com\/cdn\/products\/a5e877de116d525bf717a4ff1f1dc1dd-md.jpg","https:\/\/microless.com\/cdn\/products\/d27b68647e8187ad0759a3e56cd65598-md.jpg","https:\/\/microless.com\/cdn\/products\/6e5caff30a2a18db734619602ba2f15d-md.jpg","https:\/\/microless.com\/cdn\/products\/4fbd793e5ee0c8e70b291f04ddef535d-md.jpg","https:\/\/microless.com\/cdn\/products\/050653851b465b8bec8b147b6d6e75c8-md.jpg","https:\/\/microless.com\/cdn\/products\/6f73759b5ae83e3ccdcc6faeca651ce9-md.jpg","https:\/\/microless.com\/cdn\/products\/f031a984181c1103f86e7866fa6b67ce-md.jpg","https:\/\/microless.com\/cdn\/products\/41d90ad2de278a64e4950977107b7135-md.jpg","https:\/\/microless.com\/cdn\/products\/f69377b85f035d65ea02a00115e737e2-md.jpg","https:\/\/microless.com\/cdn\/products\/dea221d82cbbb2d75250eb350866d365-md.jpg"]';
            foreach (json_decode($tv) as $t) {
                Item::create([
                    'name' => 'Samsung 4K UHD со светодиодной подсветкой, разрешение 3840x2160, HDR',
                    'price' => 870000,
                    'info' => '75-дюймовый гостиничный телевизор Samsung 4K UHD со светодиодной подсветкой, разрешение 3840x2160, HDR, скорость движения 100, угол обзора 178/178, 1300 PQI, черный | HG75AT690UK',
                    'image' => $t,
                    'images' => json_encode([$t,$t]),
                    'category_id' => 7
                ]);
            }
    }
}
