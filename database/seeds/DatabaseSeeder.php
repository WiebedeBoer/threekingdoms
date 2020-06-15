<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //foreign key seeds
        $this->call('ForeignKeySeeder');
        //towns seeds
        $this->call('TownSeeder');
        //item types seeds
        $this->call('ItemTypeSeeder');
        //items seeds
        $this->call('ItemSeeder');
    }
	
}

//foreign keys
class ForeignKeySeeder extends Seeder
{
    public function run()
    {
        //common
		//people fk
		Schema::table('people', function (Blueprint $table) {
            $table->foreign('owner')->references('id')->on('users');
        });
        //factions fk
		Schema::table('factions', function (Blueprint $table) {
            $table->foreign('ruler')->references('person_id')->on('people');
        }); 		
		//towns fk
		Schema::table('towns', function (Blueprint $table) {
            $table->foreign('ruler')->references('person_id')->on('people');
            $table->foreign('governor')->references('person_id')->on('people');
            $table->foreign('faction')->references('faction_id')->on('factions');
        }); 
		//person
		//stats fk
		Schema::table('stats', function (Blueprint $table) {
            $table->foreign('person')->references('person_id')->on('people');
        });
		//skills fk
		Schema::table('skills', function (Blueprint $table) {
            $table->foreign('person')->references('person_id')->on('people');
        }); 
		//army
		//armies fk
		Schema::table('armies', function (Blueprint $table) {
            $table->foreign('marshall')->references('person_id')->on('people');
			$table->foreign('general')->references('person_id')->on('people');
			$table->foreign('lieutenant')->references('person_id')->on('people');
			$table->foreign('logistics')->references('town_id')->on('towns');
			$table->foreign('location')->references('town_id')->on('towns');
        });
		//coupling
        //members fk
		Schema::table('members', function (Blueprint $table) {
            $table->foreign('person')->references('person_id')->on('people');
			$table->foreign('faction')->references('faction_id')->on('factions');
        });		
        //capitals fk
		Schema::table('capitals', function (Blueprint $table) {
            $table->foreign('strategist')->references('person_id')->on('people');
			$table->foreign('faction')->references('faction_id')->on('factions');
            $table->foreign('location')->references('town_id')->on('towns');
        });
        //homes fk
		Schema::table('homes', function (Blueprint $table) {
            $table->foreign('owner')->references('person_id')->on('people');
            $table->foreign('location')->references('town_id')->on('towns');
        });		
        //items fk
		Schema::table('items', function (Blueprint $table) {
			$table->foreign('type')->references('item_type_id')->on('item_types');
            $table->foreign('owner')->references('person_id')->on('people');
            $table->foreign('location')->references('town_id')->on('towns');
        });	
	}
}

//item types seeder
class ItemTypeSeeder extends Seeder
{
    public function run()
    {
		//special items
		//1
		DB::table('item_types')->insert([            
            'item_name' => 'Red Hare',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//2
		DB::table('item_types')->insert([            
            'item_name' => 'Hex Mark',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//3
		DB::table('item_types')->insert([            
            'item_name' => 'Gray Lightning',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//4
		DB::table('item_types')->insert([            
            'item_name' => 'Shadow Runner',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//5
		DB::table('item_types')->insert([            
            'item_name' => 'White Dragon',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//6
		DB::table('item_types')->insert([            
            'item_name' => 'Black Dragon',  
            'item_category' => 'warhorse',
			'bonus' => '2',
			'bonus_category' => 'riding'
        ]);	
		//7
		DB::table('item_types')->insert([            
            'item_name' => 'Sword of Heaven',  
            'item_category' => 'sword',
			'bonus' => '10',
			'bonus_category' => 'swordmanship'
        ]);	
		//8
		DB::table('item_types')->insert([            
            'item_name' => 'Swords of Fate',  
            'item_category' => 'sword',
			'bonus' => '7',
			'bonus_category' => 'swordmanship'
        ]);	
		//9
		DB::table('item_types')->insert([            
            'item_name' => 'Seven Star Sword',  
            'item_category' => 'sword',
			'bonus' => '5',
			'bonus_category' => 'swordmanship'
        ]);	
		//10
		DB::table('item_types')->insert([            
            'item_name' => 'Ancestral Sword',  
            'item_category' => 'sword',
			'bonus' => '2',
			'bonus_category' => 'swordmanship'
        ]);	
		//11
		DB::table('item_types')->insert([            
            'item_name' => 'Throwing Blade',  
            'item_category' => 'sword',
			'bonus' => '2',
			'bonus_category' => 'agility'
        ]);	
		//12
		DB::table('item_types')->insert([            
            'item_name' => 'Crescent Halberd',  
            'item_category' => 'polearm',
			'bonus' => '7',
			'bonus_category' => 'polearms'
        ]);	
		//13
		DB::table('item_types')->insert([            
            'item_name' => 'Viper Blade',  
            'item_category' => 'polearm',
			'bonus' => '7',
			'bonus_category' => 'polearms'
        ]);	
		//14
		DB::table('item_types')->insert([            
            'item_name' => 'War Trident',  
            'item_category' => 'polearm',
			'bonus' => '2',
			'bonus_category' => 'polearms'
        ]);	
		//15
		DB::table('item_types')->insert([            
            'item_name' => 'Great Axe',  
            'item_category' => 'polearm',
			'bonus' => '2',
			'bonus_category' => 'polearms'
        ]);	
		//16
		DB::table('item_types')->insert([            
            'item_name' => 'Steel Flail',  
            'item_category' => 'polearm',
			'bonus' => '2',
			'bonus_category' => 'polearms'
        ]);	
		//17
		DB::table('item_types')->insert([            
            'item_name' => 'Art of War',  
            'item_category' => 'book',
			'bonus' => '3',
			'bonus_category' => 'tactics'
        ]);	
		//18
		DB::table('item_types')->insert([            
            'item_name' => 'Scrolls of Taigong',  
            'item_category' => 'book',
			'bonus' => '3',
			'bonus_category' => 'tactics'
        ]);	
		//19
		DB::table('item_types')->insert([            
            'item_name' => 'Tao Te Ching',  
            'item_category' => 'book',
			'bonus' => '5',
			'bonus_category' => 'leadership'
        ]);	
		//20
		DB::table('item_types')->insert([            
            'item_name' => 'Classic of Poetry',  
            'item_category' => 'book',
			'bonus' => '10',
			'bonus_category' => 'judgement'
        ]);	
		//21
		DB::table('item_types')->insert([            
            'item_name' => 'Book of Documents',  
            'item_category' => 'book',
			'bonus' => '10',
			'bonus_category' => 'judgement'
        ]);	
		//22
		DB::table('item_types')->insert([            
            'item_name' => 'Book of Rites',  
            'item_category' => 'book',
			'bonus' => '10',
			'bonus_category' => 'judgement'
        ]);	
		//23
		DB::table('item_types')->insert([            
            'item_name' => 'Spring and Autumn Annals',  
            'item_category' => 'book',
			'bonus' => '10',
			'bonus_category' => 'judgement'
        ]);	
		//24
		DB::table('item_types')->insert([            
            'item_name' => 'Imperial Seal',  
            'item_category' => 'regalia',
			'bonus' => '10',
			'bonus_category' => 'charisma'
        ]);	
		//trade items
		//25
		DB::table('item_types')->insert([            
            'item_name' => 'Jade Burial Suit',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'judgement'
        ]);	
		//26
		DB::table('item_types')->insert([            
            'item_name' => 'Hill Censer',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'engineer'
        ]);	
		//27
		DB::table('item_types')->insert([            
            'item_name' => 'Silk Fabrics',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'leadership'
        ]);	
		//28
		DB::table('item_types')->insert([            
            'item_name' => 'Hunping Jar',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'agriculture'
        ]);	
		//29
		DB::table('item_types')->insert([            
            'item_name' => 'Lacquerware',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'commerce'
        ]);	
		//30
		DB::table('item_types')->insert([            
            'item_name' => 'Hanging Scroll Painting',  
            'item_category' => 'trade',
			'bonus' => '2',
			'bonus_category' => 'charisma'
        ]);				
	}
}

//items seeder
class ItemSeeder extends Seeder
{
    public function run()
    {
		//
		DB::table('items')->insert([            
            'type' => '1',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '2',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '3',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '4',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '5',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '6',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '7',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '8',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '9',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '10',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '11',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '12',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '13',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '14',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '15',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '16',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '17',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '18',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '19',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '20',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '21',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '22',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '23',  
            'location' => '1'
        ]);	
		//
		DB::table('items')->insert([            
            'type' => '24',  
            'location' => '1'
        ]);	
	}
}

//towns seeder
class TownSeeder extends Seeder
{
    public function run()
    {
		//1
		DB::table('towns')->insert([            
            'town_name' => 'Chang An',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//2
		DB::table('towns')->insert([            
            'town_name' => 'Luo Yang',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//3
		DB::table('towns')->insert([            
            'town_name' => 'Ru Nan',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//4
		DB::table('towns')->insert([            
            'town_name' => 'Huai Nan',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//5
		DB::table('towns')->insert([            
            'town_name' => 'An Ping',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//6
		DB::table('towns')->insert([            
            'town_name' => 'Lin Zi',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//7
		DB::table('towns')->insert([            
            'town_name' => 'Fan Yang',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//8
		DB::table('towns')->insert([            
            'town_name' => 'Jin Yang',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//9
		DB::table('towns')->insert([            
            'town_name' => 'Jian Ye',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//10
		DB::table('towns')->insert([            
            'town_name' => 'Xia',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//11
		DB::table('towns')->insert([            
            'town_name' => 'Nan Jun',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//12
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Ning',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//13
		DB::table('towns')->insert([            
            'town_name' => 'Cheng Du',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//14
		DB::table('towns')->insert([            
            'town_name' => 'Peng Cheng',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//15
		DB::table('towns')->insert([            
            'town_name' => 'Tian Shui',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//16
		DB::table('towns')->insert([            
            'town_name' => 'Xi Liang',
            'population' => '1000',  
            'category_size' => 'metropolis', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
    }
}
