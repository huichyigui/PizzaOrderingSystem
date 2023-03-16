<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\User;
use App\Models\Delivery;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        static $iP = 1;
        $p1 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Italian Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza with prosciutto, mozzarella and greens',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p2 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Greek Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza with Feta cheese and olives as toppings',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p3 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Hawaiian Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza combines pizza sauce, cheese, cooked ham, and pineapple',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p4 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Caucasian Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'An Italian-style pizza that does not use tomato sauce',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p5 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'American Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza with thick crust',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p6 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Bacon Crispy Pizza',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza with bacon as toppings',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p7 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Ham & Pineapple',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Pizza with ham and pineapple as toppings',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p8 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Tomato Pie',
            'category' => 'Dessert',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'A savory summertime made by tomatoes slices, onion and cheese',
            'image' => 'M' . strval($iP++).'.webp',
            'status' => 'active'
        ]);

        sleep(1);
        $p9 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Margheritta',
            'category' => 'Pizza',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'A typical Neapolitan pizza',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(1);
        $p10 = Menu::create([
            'menu_id' => 'M' . strval($iP),
            'name' => 'Cheese Lasagna',
            'category' => 'Pasta',
            'stock' => rand(1,25),
            'price' => rand(10,30),
            'description' => 'Meatless lasagna with mozzarella, parmesan, and ricotta cheeses.',
            'image' => 'M' . strval($iP++).'.png',
            'status' => 'active'
        ]);

        sleep(0.5);
        $p11 = User::create([
            'name' => 'Annabelle',
            'email' => 'anna@gmail.com',
            'password' => Hash::make('anna1234!'),
            'address' => '123 Road',
            'phone_number' => '017-1254545',
            'role_level' => '1',
        ]);

        sleep(0.5);
        $p12 = User::create([
            'name' => 'Elaine Chia',
            'email' => 'elaine@gmail.com',
            'password' => Hash::make('chia1234!'),
            'address' => '789 Road',
            'phone_number' => '017-5488521',
            'role_level' => '2',
        ]);

        sleep(0.5);
        $p13 = User::create([
            'name' => 'Taylor Teh',
            'email' => 'taylor@gmail.com',
            'password' => Hash::make('tehh1234!'),
            'address' => '456 Road',
            'phone_number' => '011-4567231',
            'role_level' => '8',
        ]);

        
        $date = Carbon::now();

        sleep(1);
        Delivery::create([
            'deliveryID' => 'D1',
            'deliveryLocation' => '01, Jalan Genting Klang',
            'deliveryStartTime' => $date,
            'deliveryEndTime' => $date->addMinute(30),
            'deliveryStatus' => 'Pending'
        ]);

        sleep(1);
        Delivery::create([
            'deliveryID' => 'D2',
            'deliveryLocation' => '02, Jalan Genting Klang',
            'deliveryStartTime' => $date,
            'deliveryEndTime' => $date->addMinute(30),
            'deliveryStatus' => 'Processing'
        ]);

        sleep(1);
        Delivery::create([
            'deliveryID' => 'D3',
            'deliveryLocation' => '03, Jalan Genting Klang',
            'deliveryStartTime' => $date,
            'deliveryEndTime' => $date->addMinute(30),
            'deliveryStatus' => 'Delivering'
        ]);

        sleep(1);
        Delivery::create([
            'deliveryID' => 'D4',
            'deliveryLocation' => '04, Jalan Genting Klang',
            'deliveryStartTime' => $date,
            'deliveryEndTime' => $date->addMinute(30),
            'deliveryStatus' => 'Delivered'
        ]);
    }
}
