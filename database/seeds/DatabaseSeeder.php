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
        //users seeds
        $this->call('UserSeeder');
        //towns seeds
        $this->call('TownSeeder');
        //item types seeds
        $this->call('ItemTypeSeeder');
        //items seeds
        $this->call('ItemSeeder');
        //building types seeds
        $this->call('BuildingTypeSeeder');
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
		
		//relations
		//relations fk
		Schema::table('relations', function (Blueprint $table) {
            $table->foreign('to')->references('person_id')->on('people');
			$table->foreign('from')->references('person_id')->on('people');
        });	
		//stances fk
		Schema::table('stances', function (Blueprint $table) {
            $table->foreign('to')->references('faction_id')->on('factions');
			$table->foreign('from')->references('faction_id')->on('factions');
        });	
		//applicants fk
		Schema::table('applicants', function (Blueprint $table) {
            $table->foreign('person')->references('person_id')->on('people');
			$table->foreign('faction')->references('faction_id')->on('factions');
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
		
		//forum
		//threads fk
		Schema::table('threads', function (Blueprint $table) {
            $table->foreign('creator')->references('id')->on('users');
			$table->foreign('tavern')->references('town_id')->on('towns');
			$table->foreign('faction')->references('faction_id')->on('factions');
			$table->foreign('belligerent')->references('faction_id')->on('factions');
        });		
		//posts fk
		Schema::table('posts', function (Blueprint $table) {
            $table->foreign('creator')->references('id')->on('users');
			$table->foreign('thread')->references('thread_id')->on('threads');
        });	
		
		//chronicle
		//chronicles fk
		Schema::table('chronicles', function (Blueprint $table) {
            $table->foreign('person')->references('person_id')->on('people');
			$table->foreign('town')->references('town_id')->on('towns');
			$table->foreign('faction')->references('faction_id')->on('factions');
			$table->foreign('belligerent')->references('faction_id')->on('factions');
        });	
		
		//dungeon
		//dungeons fk
		Schema::table('dungeons', function (Blueprint $table) {
            $table->foreign('dungeon_master')->references('person_id')->on('people');
			$table->foreign('town')->references('town_id')->on('towns');
        });	
		//prisoners fk
		Schema::table('prisoners', function (Blueprint $table) {
            $table->foreign('prisoner')->references('person_id')->on('people');
			$table->foreign('dungeon')->references('dungeon_id')->on('dungeons');
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
        //farms fk
		Schema::table('farms', function (Blueprint $table) {
            $table->foreign('owner')->references('person_id')->on('people');
            $table->foreign('location')->references('town_id')->on('towns');
        });	
        //workshops fk
		Schema::table('workshops', function (Blueprint $table) {
            $table->foreign('owner')->references('person_id')->on('people');
            $table->foreign('location')->references('town_id')->on('towns');
        });	
        //items fk
		Schema::table('items', function (Blueprint $table) {
			$table->foreign('type')->references('item_type_id')->on('item_types');
            $table->foreign('owner')->references('person_id')->on('people');
            $table->foreign('location')->references('town_id')->on('towns');
        });	
        //buildings fk
		Schema::table('buildings', function (Blueprint $table) {
			$table->foreign('type')->references('building_type_id')->on('building_types');
            $table->foreign('town')->references('town_id')->on('towns');
        });	
	}
}

class BuildingTypeSeeder extends Seeder
{	
	//admins game moderator
    public function run()
    {
		//1
		DB::table('building_types')->insert([
			'type_name' => 'barracks',
			'building_category' => 'military'
		]);
		//2
		DB::table('building_types')->insert([
			'type_name' => 'granary',
			'building_category' => 'industrial'
		]);
		//3
		DB::table('building_types')->insert([
			'type_name' => 'hospital',
			'building_category' => 'health'
		]);
		//4
		DB::table('building_types')->insert([
			'type_name' => 'stables',
			'building_category' => 'military'
		]);

	}
}

class UserSeeder extends Seeder
{	
	//admins game moderator
    public function run()
    {
		//1 default admin game master
		DB::table('users')->insert([
			'name' => 'GameMaster',
			'email' => 'info@romegames.nl',
			'password' => '$2y$10$cGxbdYZ84Jd1iBerxc4YcOSSUmu6JeIFc5JhrPe5Fh9MRTQcl3xwO',
			'audio' => '0',
			'admin' => '1'
		]);
		//2 admin player
		DB::table('users')->insert([
			'name' => 'Wiebe',
			'email' => 'wiebe81@gmail.com',
			'password' => '$2y$10$cGxbdYZ84Jd1iBerxc4YcOSSUmu6JeIFc5JhrPe5Fh9MRTQcl3xwO',
			'audio' => '0',
			'admin' => '1'
		]);
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
		//1, red hare, horse, luo yang
		DB::table('items')->insert([            
            'type' => '1',  
            'location' => '2'
        ]);	
		//2, hex mark, horse, Fan Yang
		DB::table('items')->insert([            
            'type' => '2',  
            'location' => '7'
        ]);	
		//3, gray lightning, horse, Huai Nan
		DB::table('items')->insert([            
            'type' => '3',  
            'location' => '4'
        ]);	
		//4, shadow runner, horse, Tian Shui
		DB::table('items')->insert([            
            'type' => '4',  
            'location' => '15'
        ]);	
		//5, white dragon, horse, an ping
		DB::table('items')->insert([            
            'type' => '5',  
            'location' => '5'
        ]);	
		//6, black dragon, horse, ru nan
		DB::table('items')->insert([            
            'type' => '6',  
            'location' => '3'
        ]);	
		//7, Sword of Heaven, sword, luo yang
		DB::table('items')->insert([            
            'type' => '7',  
            'location' => '2'
        ]);	
		//8, Swords of Fate, sword, Fan Yang
		DB::table('items')->insert([            
            'type' => '8',  
            'location' => '7'
        ]);	
		//9, Seven Star Sword, sword, luo yang
		DB::table('items')->insert([            
            'type' => '9',  
            'location' => '2'
        ]);	
		//10, ancestral sword, sword, Huai Nan
		DB::table('items')->insert([            
            'type' => '10',  
            'location' => '4'
        ]);	
		//11, Throwing Blade, sword, Fan Yang
		DB::table('items')->insert([            
            'type' => '11',  
            'location' => '7'
        ]);	
		//12, Crescent Halberd, polearms, luo yang
		DB::table('items')->insert([            
            'type' => '12',  
            'location' => '2'
        ]);	
		//13, Viper Blade, polearms, Fan Yang
		DB::table('items')->insert([            
            'type' => '13',  
            'location' => '7'
        ]);	
		//14, War Trident, polearms, dong jun
		DB::table('items')->insert([            
            'type' => '14',  
            'location' => '17'
        ]);	
		//15, Great Axe, polearms, luo yang
		DB::table('items')->insert([            
            'type' => '15',  
            'location' => '2'
        ]);	
		//16, Steel Flail, polearms, nan hai
		DB::table('items')->insert([            
            'type' => '16',  
            'location' => '18'
        ]);	
		//17, Art of War, book, Huai Nan
		DB::table('items')->insert([            
            'type' => '17',  
            'location' => '4'
        ]);	
		//18, Scrolls of Taigong, book, Chang An
		DB::table('items')->insert([            
            'type' => '18',  
            'location' => '1'
        ]);	
		//19, Tao Te Ching, book, Huai Nan
		DB::table('items')->insert([            
            'type' => '19',  
            'location' => '4'
        ]);	
		//20, Classic of Poetry, book, Luo Yang
		DB::table('items')->insert([            
            'type' => '20',  
            'location' => '2'
        ]);	
		//21, book of documents, book, Peng Cheng
		DB::table('items')->insert([            
            'type' => '21',  
            'location' => '14'
        ]);	
		//22, book of rites, book, Nan Jun
		DB::table('items')->insert([            
            'type' => '22',  
            'location' => '11'
        ]);	
		//23, Spring and Autumn Annals, book, Peng Cheng
		DB::table('items')->insert([            
            'type' => '23',  
            'location' => '14'
        ]);	
		//24, imperial seal, luo yang
		DB::table('items')->insert([            
            'type' => '24',  
            'location' => '2'
        ]);	
	}
}

//towns seeder
class TownSeeder extends Seeder
{
    public function run()
    {
		//provincial and national capitals
		//1
		DB::table('towns')->insert([            
            'town_name' => 'Chang An',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcoord' => '1962',
			'ycoord' => '1466', 
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//2
		DB::table('towns')->insert([            
            'town_name' => 'Luo Yang',
            'population' => '240000',  
            'category_size' => 'legendary', 
            'xcoord' => '2424',
			'ycoord' => '1399',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//3
		DB::table('towns')->insert([            
            'town_name' => 'Ru Nan',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2670',
			'ycoord' => '1660',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//4
		DB::table('towns')->insert([            
            'town_name' => 'Huai Nan',
            'population' => '180000',  
            'category_size' => 'enormous', 
            'xcoord' => '3012',
			'ycoord' => '1721',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'			
        ]);
		//5
		DB::table('towns')->insert([            
            'town_name' => 'An Ping',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcoord' => '2836',
			'ycoord' => '932',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes'				
        ]);
		//6
		DB::table('towns')->insert([            
            'town_name' => 'Lin Zi',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcoord' => '3190',
			'ycoord' => '1058',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//7
		DB::table('towns')->insert([            
            'town_name' => 'Fan Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2827',
			'ycoord' => '631',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'lacquerware' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//8
		DB::table('towns')->insert([            
            'town_name' => 'Jin Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2443',
			'ycoord' => '875',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes',
			'category_rebel' => 'Black Mountain Bandits'			
        ]);
		//9
		DB::table('towns')->insert([            
            'town_name' => 'Jian Ye',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcoord' => '3249',
			'ycoord' => '1817',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'			
        ]);
		//10
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Xia',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2669',
			'ycoord' => '2072',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//11
		DB::table('towns')->insert([            
            'town_name' => 'Nan Jun',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2399',
			'ycoord' => '2074',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'	
        ]);
		//12
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Ning',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '1211',
			'ycoord' => '2706',
			'category_rebel' => 'Dianyue'
        ]);
		//13
		DB::table('towns')->insert([            
            'town_name' => 'Cheng Du',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcoord' => '1328',
			'ycoord' => '2020',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Baima'			
        ]);
		//14, xuzhou
		DB::table('towns')->insert([            
            'town_name' => 'Peng Cheng',
            'population' => '90000',  
            'category_size' => 'remarkable', 
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
            'xcoord' => '3049',
			'ycoord' => '1464',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//15
		DB::table('towns')->insert([            
            'town_name' => 'Tian Shui',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '1568',
			'ycoord' => '1416',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Qiang'
        ]);
		//16, wu wei
		DB::table('towns')->insert([            
            'town_name' => 'Xi Liang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '1138',
			'ycoord' => '868',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Yuezhi'			
        ]);
		//17, heze
		DB::table('towns')->insert([            
            'town_name' => 'Dong Jun',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2823',
			'ycoord' => '1305',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes'				
        ]);
		//18
		DB::table('towns')->insert([            
            'town_name' => 'Nan Hai',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcoord' => '2532',
			'ycoord' => '3123',
			'category_rebel' => 'Nanyue'			
        ]);
		//19, hanzhong
		DB::table('towns')->insert([            
            'town_name' => 'Nan Zhen',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '1715',
			'ycoord' => '1650',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Five Pecks of Rice'				
        ]);
		//20
		DB::table('towns')->insert([            
            'town_name' => 'Xu Chang',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcoord' => '2608',
			'ycoord' => '1501',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//21
		DB::table('towns')->insert([            
            'town_name' => 'Nan Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2438',
			'ycoord' => '1663',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//korean
		//22
		DB::table('towns')->insert([            
            'town_name' => 'Shenyang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3862',
			'ycoord' => '209',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);				
		//23, jinzhou
		DB::table('towns')->insert([            
            'town_name' => 'Tuhe',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3566',
			'ycoord' => '327',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);	
		//24
		DB::table('towns')->insert([            
            'town_name' => 'Liaoyang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3838',
			'ycoord' => '302',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);		
		//towns north of wall
		//25
		DB::table('towns')->insert([            
            'town_name' => 'Shang Gu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2744',
			'ycoord' => '375',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Wuhuan'
        ]);	
		//26
		DB::table('towns')->insert([            
            'town_name' => 'Dai Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2677',
			'ycoord' => '529',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Wuhuan'			
        ]);	
		//27
		DB::table('towns')->insert([            
            'town_name' => 'Yun Zhong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2446',
			'ycoord' => '572',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Wuhuan'			
        ]);	
		//28
		DB::table('towns')->insert([            
            'town_name' => 'Jiu Yuan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2098',
			'ycoord' => '406',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Xiongnu'			
        ]);	
		//far west
		//29
		DB::table('towns')->insert([            
            'town_name' => 'Xi Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1062',
			'ycoord' => '795',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Yuezhi'			
        ]);	
		//30
		DB::table('towns')->insert([            
            'town_name' => 'Zhang Ye',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '856',
			'ycoord' => '698',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Yuezhi'			
        ]);	
		//31
		DB::table('towns')->insert([            
            'town_name' => 'Long You',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1026',
			'ycoord' => '1082',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Qiang'			
        ]);
		//far south
		//32
		DB::table('towns')->insert([            
            'town_name' => 'Cang Wu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2306',
			'ycoord' => '2947',
			'category_rebel' => 'Nanyue'			
        ]);	
		//33
		DB::table('towns')->insert([            
            'town_name' => 'Yu Lin',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2102',
			'ycoord' => '3255',
			'category_rebel' => 'Nanyue'			
        ]);	
		//34
		DB::table('towns')->insert([            
            'town_name' => 'He Pu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2000',
			'ycoord' => '3336',
			'category_rebel' => 'Nanyue'			
        ]);	
		//35
		DB::table('towns')->insert([            
            'town_name' => 'Shi Xing',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2528',
			'ycoord' => '2724',
			'category_rebel' => 'Nanyue'			
        ]);
		//36
		DB::table('towns')->insert([            
            'town_name' => 'Lin He',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2557',
			'ycoord' => '2960',
			'category_rebel' => 'Nanyue'			
        ]);
		//37
		DB::table('towns')->insert([            
            'town_name' => 'Gao Liang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2218',
			'ycoord' => '3304',
			'category_rebel' => 'Nanyue'			
        ]);
		//south
		//38
		DB::table('towns')->insert([            
            'town_name' => 'Chang Sha',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2497',
			'ycoord' => '2395',
			'tea' => 'yes',
			'lacquerware' => 'yes'
        ]);		
		//39
		DB::table('towns')->insert([            
            'town_name' => 'Wu Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2325',
			'ycoord' => '2271',
			'tea' => 'yes',
			'lacquerware' => 'yes'
        ]);	
		//40
		DB::table('towns')->insert([            
            'town_name' => 'Ling Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2318',
			'ycoord' => '2683',
			'tea' => 'yes',
			'category_rebel' => 'Nanyue'
        ]);	
		//41
		DB::table('towns')->insert([            
            'town_name' => 'Gui Yang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2543',
			'ycoord' => '2842',
			'category_rebel' => 'Nanyue'				
        ]);				
		//42
		DB::table('towns')->insert([            
            'town_name' => 'Gui Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2140',
			'ycoord' => '2821',
			'tea' => 'yes',
			'category_rebel' => 'Nanyue'
        ]);
		//43
		DB::table('towns')->insert([            
            'town_name' => 'Lei Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2477',
			'ycoord' => '2656',
			'tea' => 'yes',
			'category_rebel' => 'Nanyue'
        ]);
		//44
		DB::table('towns')->insert([            
            'town_name' => 'Zhao Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2298',
			'ycoord' => '2535',
			'tea' => 'yes',
			'category_rebel' => 'Nanyue'
        ]);
		//45
		DB::table('towns')->insert([            
            'town_name' => 'Xiang Tan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2488',
			'ycoord' => '2448',
			'tea' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//46
		DB::table('towns')->insert([            
            'town_name' => 'Ba Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2515',
			'ycoord' => '2218',
			'tea' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//47
		DB::table('towns')->insert([            
            'town_name' => 'An Cheng',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2848',
			'ycoord' => '2266',
			'tea' => 'yes'				
        ]);
		//48
		DB::table('towns')->insert([            
            'town_name' => 'Lu Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2832',
			'ycoord' => '2472',
			'tea' => 'yes'				
        ]);
		//49
		DB::table('towns')->insert([            
            'town_name' => 'Lin Chuang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2936',
			'ycoord' => '2424',
			'tea' => 'yes'				
        ]);
		//50
		DB::table('towns')->insert([            
            'town_name' => 'Jian An',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3226',
			'ycoord' => '2432',
			'tea' => 'yes',
			'category_rebel' => 'Minyue'			
        ]);
		//51
		DB::table('towns')->insert([            
            'town_name' => 'Yan Ping',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3176',
			'ycoord' => '2626',
			'tea' => 'yes',
			'category_rebel' => 'Minyue'			
        ]);
		//52
		DB::table('towns')->insert([            
            'town_name' => 'Nan Chang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2878',
			'ycoord' => '2322',
			'tea' => 'yes'				
        ]);
		//53
		DB::table('towns')->insert([            
            'town_name' => 'Jiu Jiang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2890',
			'ycoord' => '2166',
			'tea' => 'yes'				
        ]);	
		//54
		DB::table('towns')->insert([            
            'town_name' => 'Ba Dong',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2236',
			'ycoord' => '1997',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);	
		//55
		DB::table('towns')->insert([            
            'town_name' => 'Lin Jiang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1894',
			'ycoord' => '2001',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Yelang'
        ]);					
		//far southwest
		//56
		DB::table('towns')->insert([            
            'town_name' => 'Jian Wei',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1284',
			'ycoord' => '2189',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Yelang'			
        ]);	
		//57, chongqing
		DB::table('towns')->insert([            
            'town_name' => 'Ba Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1645',
			'ycoord' => '2192',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Yelang',
        ]);	
		//58
		DB::table('towns')->insert([            
            'town_name' => 'Zhu Ti',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1420',
			'ycoord' => '2222',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Yelang'			
        ]);	
		//59
		DB::table('towns')->insert([            
            'town_name' => 'Yue Juan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1160',
			'ycoord' => '2294',
			'category_rebel' => 'Dianyue'			
        ]);	
		//60
		DB::table('towns')->insert([            
            'town_name' => 'Guang Han',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1557',
			'ycoord' => '1750',
			'tea' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Baima'			
        ]);
		//61
		DB::table('towns')->insert([            
            'town_name' => 'De Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1356',
			'ycoord' => '1976',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Baima'				
        ]);
		//62
		DB::table('towns')->insert([            
            'town_name' => 'Xi Chang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1090',
			'ycoord' => '2439',
			'category_rebel' => 'Dianyue'				
        ]);
		//63
		DB::table('towns')->insert([            
            'town_name' => 'Yun Nan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1066',
			'ycoord' => '2842',
			'category_rebel' => 'Dianyue'				
        ]);
		//64
		DB::table('towns')->insert([            
            'town_name' => 'Xing Gu',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1292',
			'ycoord' => '2790',
			'category_rebel' => 'Dianyue'			
        ]);
		//east
		//65
		DB::table('towns')->insert([            
            'town_name' => 'Hui Ji',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3529',
			'ycoord' => '2119',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes'
        ]);
		//66, suzhou
		DB::table('towns')->insert([            
            'town_name' => 'Wu Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3490',
			'ycoord' => '1924',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes'
        ]);
		//67
		DB::table('towns')->insert([            
            'town_name' => 'Guang Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3350',
			'ycoord' => '1755',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'
        ]);
		//68
		DB::table('towns')->insert([            
            'town_name' => 'Wan Cheng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3058',
			'ycoord' => '1843',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'
        ]);
		//69
		DB::table('towns')->insert([            
            'town_name' => 'Lin Hai',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3564',
			'ycoord' => '2298',
			'tea' => 'yes',	
			'category_rebel' => 'Minyue'			
        ]);
		//70
		DB::table('towns')->insert([            
            'town_name' => 'Wen Zhou',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3502',
			'ycoord' => '2426',
			'tea' => 'yes',
			'category_rebel' => 'Minyue'			
        ]);
		//71
		DB::table('towns')->insert([            
            'town_name' => 'Dong Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3446',
			'ycoord' => '2233',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes'
        ]);
		//72
		DB::table('towns')->insert([            
            'town_name' => 'Fu Chun',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3425',
			'ycoord' => '2102',
			'tea' => 'yes',
			'silk' => 'yes',
			'fabrics' => 'yes'
        ]);
		//73
		DB::table('towns')->insert([            
            'town_name' => 'Yin Shang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2926',
			'ycoord' => '1717',
			'tea' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'
        ]);
		//74
		DB::table('towns')->insert([            
            'town_name' => 'Ru Jin',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2870',
			'ycoord' => '1676',
			'tea' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'
        ]);
		//75
		DB::table('towns')->insert([            
            'town_name' => 'Gu Shi',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2766',
			'ycoord' => '1797',
			'tea' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//76
		DB::table('towns')->insert([            
            'town_name' => 'Lu Shan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2486',
			'ycoord' => '1584',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'paintings' => 'yes'
        ]);
		//west
		//77, lanzhou
		DB::table('towns')->insert([            
            'town_name' => 'Jin Cheng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1299',
			'ycoord' => '1175',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Qiang'			
        ]);
		//78
		DB::table('towns')->insert([            
            'town_name' => 'Long Xi',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1407',
			'ycoord' => '1344',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Qiang'			
        ]);
		//79
		DB::table('towns')->insert([            
            'town_name' => 'Fuping',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1608',
			'ycoord' => '777',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Xiongnu'	
        ]);
		//80
		DB::table('towns')->insert([            
            'town_name' => 'Fu Feng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '1760',
			'ycoord' => '1451',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//81
		DB::table('towns')->insert([            
            'town_name' => 'An Ding',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1399',
			'ycoord' => '1251',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'category_rebel' => 'Qiang'
        ]);
		//centre
		//82
		DB::table('towns')->insert([            
            'town_name' => 'Feng Xiang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2038',
			'ycoord' => '1424',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//83
		DB::table('towns')->insert([            
            'town_name' => 'He Dong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2159',
			'ycoord' => '1268',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//84
		DB::table('towns')->insert([            
            'town_name' => 'Hong Nong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2221',
			'ycoord' => '1422',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes'
        ]);
		//yellow river
		//85
		DB::table('towns')->insert([            
            'town_name' => 'Kaifeng',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcoord' => '2674',
			'ycoord' => '1378',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes'
        ]);
		//86
		DB::table('towns')->insert([            
            'town_name' => 'Chao Ge',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2614',
			'ycoord' => '1289',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'paintings' => 'yes'
        ]);
		//87
		DB::table('towns')->insert([            
            'town_name' => 'Chen Liu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2779',
			'ycoord' => '1403',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'pottery' => 'yes'
        ]);
		//88
		DB::table('towns')->insert([            
            'town_name' => 'Wei Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2654',
			'ycoord' => '1199',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'paintings' => 'yes'
        ]);
		//89
		DB::table('towns')->insert([            
            'town_name' => 'Guang Ping',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2819',
			'ycoord' => '1109',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//90
		DB::table('towns')->insert([            
            'town_name' => 'Fan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2791',
			'ycoord' => '1228',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//91
		DB::table('towns')->insert([            
            'town_name' => 'Dong Ping',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2904',
			'ycoord' => '1219',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//92
		DB::table('towns')->insert([            
            'town_name' => 'Qi Bei',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2924',
			'ycoord' => '1089',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//93
		DB::table('towns')->insert([            
            'town_name' => 'Qi Nan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3023',
			'ycoord' => '1075',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//94
		DB::table('towns')->insert([            
            'town_name' => 'Le An',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3132',
			'ycoord' => '996',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//95
		DB::table('towns')->insert([            
            'town_name' => 'Qing He',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2856',
			'ycoord' => '1010',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//96
		DB::table('towns')->insert([            
            'town_name' => 'Zhao Guo',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2731',
			'ycoord' => '901',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes',
			'category_rebel' => 'Black Mountain Bandits'
        ]);
		//97
		DB::table('towns')->insert([            
            'town_name' => 'Chang Shan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2690',
			'ycoord' => '858',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes',
			'category_rebel' => 'Black Mountain Bandits'
        ]);
		//98
		DB::table('towns')->insert([            
            'town_name' => 'Zhong Shan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2759',
			'ycoord' => '773',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//99
		DB::table('towns')->insert([            
            'town_name' => 'Zhuo Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2659',
			'ycoord' => '617',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Wuhuan'
        ]);	
		//100
		DB::table('towns')->insert([            
            'town_name' => 'Yu Yang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3078',
			'ycoord' => '513',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes'
        ]);
		//101
		DB::table('towns')->insert([            
            'town_name' => 'Bei Ping',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2944',
			'ycoord' => '528',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes'
        ]);
		//102
		DB::table('towns')->insert([            
            'town_name' => 'Liao Xi',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3461',
			'ycoord' => '465',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes'
        ]);
		//103
		DB::table('towns')->insert([            
            'town_name' => 'Bo Hai',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3006',
			'ycoord' => '803',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//104
		DB::table('towns')->insert([            
            'town_name' => 'Ping Yuan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2950',
			'ycoord' => '996',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);		
		//105
		DB::table('towns')->insert([            
            'town_name' => 'De Zhou',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2933',
			'ycoord' => '947',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);			
		//106
		DB::table('towns')->insert([            
            'town_name' => 'Nan Pi',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2967',
			'ycoord' => '846',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'lacquerware' => 'yes'
        ]);			
		//near north east
		//107
		DB::table('towns')->insert([            
            'town_name' => 'Lu Guo',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3262',
			'ycoord' => '1071',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);	
		//108
		DB::table('towns')->insert([            
            'town_name' => 'Ren Cheng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2972',
			'ycoord' => '1281',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//109
		DB::table('towns')->insert([            
            'town_name' => 'Xia Pi',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3150',
			'ycoord' => '1455',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//110
		DB::table('towns')->insert([            
            'town_name' => 'Dong Hai',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3253',
			'ycoord' => '1421',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//111
		DB::table('towns')->insert([            
            'town_name' => 'Lang Ya',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3264',
			'ycoord' => '1253',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'pottery' => 'yes'
        ]);
		//112
		DB::table('towns')->insert([            
            'town_name' => 'Bei Hai',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3306',
			'ycoord' => '1060',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//113
		DB::table('towns')->insert([            
            'town_name' => 'Chang Yi',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3338',
			'ycoord' => '1048',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//114
		DB::table('towns')->insert([            
            'town_name' => 'Dong Lai',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '3408',
			'ycoord' => '991',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes'
        ]);
		//115
		DB::table('towns')->insert([            
            'town_name' => 'Feng Lai',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3517',
			'ycoord' => '889',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes'
        ]);	
		//116
		DB::table('towns')->insert([            
            'town_name' => 'Mou Ping',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '3625',
			'ycoord' => '957',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'censer' => 'yes'
        ]);	
		//centre north
		//117
		DB::table('towns')->insert([            
            'town_name' => 'Shang Dang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2514',
			'ycoord' => '1155',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'paintings' => 'yes'
        ]);	
		//118
		DB::table('towns')->insert([            
            'town_name' => 'Xi He',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2325',
			'ycoord' => '1073',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'category_rebel' => 'Xiongnu'
        ]);	
		//119
		DB::table('towns')->insert([            
            'town_name' => 'Yan Men',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2459',
			'ycoord' => '736',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Wuhuan'
        ]);
		//120
		DB::table('towns')->insert([            
            'town_name' => 'Shang Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcoord' => '2071',
			'ycoord' => '808',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'category_rebel' => 'Xiongnu'
        ]);
		//121
		DB::table('towns')->insert([            
            'town_name' => 'Ping Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2299',
			'ycoord' => '1175',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes'
        ]);
		//122
		DB::table('towns')->insert([            
            'town_name' => 'Jin Cheng',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2472',
			'ycoord' => '1261',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'paintings' => 'yes'
        ]);	
		//123
		DB::table('towns')->insert([            
            'town_name' => 'Shou Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '2575',
			'ycoord' => '880',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes',
			'category_rebel' => 'Black Mountain Bandits'	
        ]);
		//124
		DB::table('towns')->insert([            
            'town_name' => 'Gao Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1966',
			'ycoord' => '1407',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);	
		//125
		DB::table('towns')->insert([            
            'town_name' => 'Wu Gong',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcoord' => '1903',
			'ycoord' => '1457',
			'staple_food' => 'wheat',
			'plum' => 'yes',
			'peach' => 'yes',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'
        ]);			
    }
}
