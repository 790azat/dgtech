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
        $items = [
            [   'name' => 'ՍՄԱՐԹՖՈՆ REALME 9I 4 GB 128 GB RMX3491/4128/BLACK BLACK',
                'price' => 95000,
                'info' => 'Սմարթֆոն REALME 9i 4 GB 128 GB RMX3491/4128/BLACK Black Անկյունագիծ` 6.6 " / Կետայնություն` 2412 x 1080 / Մատրիցայի տեսակ` IPS,LCD / Օպերատիվ հիշողություն` 4 GB / Հիշողություն` 128 GB / Օպերացիոն համակարգ` Android / Պրոցեսորի մոդել` Qualcomm Snapdragon / Պրոցեսոր` Qualcomm SM6225 Snapdragon 680 4G (6 nm) / Տեսաքարտ` Adreno 610 / Հիմնական տեսախցիկ` 50MP / Տեսախցիկ` 50 MP + 5 MP + 5 MP / Դիմացի տեսախցիկ` 16MP / SIM քարտի տեսակ` nano-SIM / SIM քարտերի քանակ` 2 / Wi-Fi` 802.11 a/b/g/n/ac / Անլար հաղորդակցություն` Bluetoothv5.0 / GLONASS / GPS / Առանձնահատկություններ` Fast Charging / Միացման տեսակը` USB Type-C 2.0, USB On-The-Go / Մարտկոցի հզորությունը` 5000 mAh / Գույն` Սև / Չափս` 164.4 x 75.7 x 8.4 մմ / Քաշ` 190 գ',
                'image' => 'phone.png',
                'images' => '["phone.png","phone.png","phone.png","phone.png"]',
                'category_id' => '1',
            ],
            [   'name' => 'ՍՄԱՐԹՖՈՆ APPLE IPHONE 13 256 GB MLP73RU/A BLUE',
                'price' => 549000,
                'info' => 'Սմարթֆոն APPLE IPHONE 13 256 GB MLP73RU/A Blue / Անկյունագիծ` 6.1 " / Կետայնություն` 2532 x 1170 / Մատրիցայի տեսակ` OLED / Պրոցեսոր` Apple A15 Bionic/ Hexa-core / SIM քարտի տեսակ` nano-SIM + eSIM / SIM քարտերի քանակ` 1 SIM / Միացման տեսակը` Lightning / Տեսախցիկ` 12 MP / Հիմնական տեսախցիկ` 12MP / Դիմացի տեսացիկ` 12MP / Wi-Fi` 802.11 a/b/g/n/ac/ax / Անլար հաղորդակցություն` Bluetooth v5.0, Galileo, Beidou, GPS, 3G, 4G (LTE), 5G / Օպերացիոն համակարգ` Apple iOS / Առանձնահատկություններ` Արագ սնուցում,Անլար սնուցում,NFC / Չափս` 71.5 х 146.7 х 7.65 մմ / Քաշ` 173 գ / Գույն` Կապույտ',
                'image' => 'phone2.png',
                'images' => '["phone2.png","phone2.png","phone2.png","phone2.png"]',
                'category_id' => '1',
            ],
            [   'name' => 'ՍՄԱՐԹՖՈՆ XIAOMI REDMI NOTE 8 4 GB 64 GB 32538 BLAC',
                'price' => 104000,
                'info' => 'Սմարթֆոն XIAOMI Redmi Note 8 4 GB 64 GB 32538 Black Անկյունագիծ` 6.3 " / Կետայնություն` 2340 x 1080 / Մատրիցայի տեսակ` IPS / Օպերատիվ հիշողություն` 4 GB / Հիշողություն` 64 GB / Օպերացիոն համակարգ` Android / Պրոցեսորի մոդել` Mediatek / Պրոցեսոր` Mediatek Helio G85, 2000MHz, 8-core / Տեսաքարտ` ARM Mali-G52 / Հիմնական տեսախցիկ` 48MP / Տեսախցիկ` 2 MP + 2 MP+ 2 MP / Դիմացի տեսախցիկ` 8MP / SIM քարտի տեսակ` nano-SIM / SIM քարտերի քանակ` 2 / Wi-Fi` 802.11 a / b / g / n / ac / Անլար հաղորդակցություն` GPS, GLONASS, BeiDou, A-GPS / Առանձնահատկություններ` Fast Charging / Միացման տեսակը` USB Type-C / Մարտկոցի հզորությունը` 4000 mAh / Գույն` Սև / Չափս` 75.3 x 158.3 x 8.4 մմ / Քաշ` 190 գ',
                'image' => 'phone3.png',
                'images' => '["phone3.png","phone3.png","phone3.png","phone3.png"]',
                'category_id' => '1',
            ]
        ];

        for ($i=1;$i<=24;$i++) {
            Item::insert($items);
        }

    }
}
