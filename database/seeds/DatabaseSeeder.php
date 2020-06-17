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
            'xcooord' => '1962',
			'ycooord' => '1466', 
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes'
        ]);
		//2
		DB::table('towns')->insert([            
            'town_name' => 'Luo Yang',
            'population' => '240000',  
            'category_size' => 'legendary', 
            'xcooord' => '2424',
			'ycooord' => '1399',
			'staple_food' => 'wheat',
			'censer' => 'yes',
			'paintings' => 'yes'
        ]);
		//3
		DB::table('towns')->insert([            
            'town_name' => 'Ru Nan',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2670',
			'ycooord' => '1660',
			'staple_food' => 'wheat',
			'jade' => 'yes'
        ]);
		//4
		DB::table('towns')->insert([            
            'town_name' => 'Huai Nan',
            'population' => '180000',  
            'category_size' => 'enormous', 
            'xcooord' => '3012',
			'ycooord' => '1721',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'			
        ]);
		//5
		DB::table('towns')->insert([            
            'town_name' => 'An Ping',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '2836',
			'ycooord' => '932',
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'lacquerware' => 'yes',
			'paintings' => 'yes'				
        ]);
		//6
		DB::table('towns')->insert([            
            'town_name' => 'Lin Zi',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '3190',
			'ycooord' => '1058',
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'censer' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//7
		DB::table('towns')->insert([            
            'town_name' => 'Fan Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2827',
			'ycooord' => '631',
			'staple_food' => 'wheat',
			'lacquerware' => 'yes',
			'jade' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//8
		DB::table('towns')->insert([            
            'town_name' => 'Jin Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2443',
			'ycooord' => '875',
			'staple_food' => 'wheat',
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
            'xcooord' => '3249',
			'ycooord' => '1817',
			'fabrics' => 'yes',
			'pottery' => 'yes',
			'paintings' => 'yes'			
        ]);
		//10
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Xia',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2669',
			'ycooord' => '2072',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//11
		DB::table('towns')->insert([            
            'town_name' => 'Nan Jun',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2399',
			'ycooord' => '2074',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'	
        ]);
		//12
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Ning',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '1211',
			'ycooord' => '2706',
			'fabrics' => 'yes',
			'category_rebel' => 'Dianyue'
        ]);
		//13
		DB::table('towns')->insert([            
            'town_name' => 'Cheng Du',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcooord' => '1328',
			'ycooord' => '2020',
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
            'xcooord' => '3049',
			'ycooord' => '1464',
			'pottery' => 'yes'
        ]);
		//15
		DB::table('towns')->insert([            
            'town_name' => 'Tian Shui',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '1568',
			'ycooord' => '1416',
			'staple_food' => 'wheat',
			'lacquerware' => 'yes'
        ]);
		//16, wu wei
		DB::table('towns')->insert([            
            'town_name' => 'Xi Liang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '1138',
			'ycooord' => '868',
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'category_rebel' => 'Yuezhi'			
        ]);
		//17, heze
		DB::table('towns')->insert([            
            'town_name' => 'Dong Jun',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2823',
			'ycooord' => '1305',
			'staple_food' => 'wheat',
			'fabrics' => 'yes',
			'pottery' => 'yes'				
        ]);
		//18
		DB::table('towns')->insert([            
            'town_name' => 'Nan Hai',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcooord' => '2532',
			'ycooord' => '3123',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'category_rebel' => 'Nanyue'			
        ]);
		//19, hanzhong
		DB::table('towns')->insert([            
            'town_name' => 'Nan Zhen',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '1715',
			'ycooord' => '1650',
			'jade' => 'yes',
			'fabrics' => 'yes',
			'category_rebel' => 'Five Pecks of Rice'				
        ]);
		//20
		DB::table('towns')->insert([            
            'town_name' => 'Xu Chang',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '2608',
			'ycooord' => '1501',
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'fabrics' => 'yes'				
        ]);
		//21
		DB::table('towns')->insert([            
            'town_name' => 'Nan Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2438',
			'ycooord' => '1663',
			'staple_food' => 'wheat',
			'jade' => 'yes',
			'fabrics' => 'yes'				
        ]);
		//korean
		//22
		DB::table('towns')->insert([            
            'town_name' => 'Shenyang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3862',
			'ycooord' => '209',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);				
		//23, jinzhou
		DB::table('towns')->insert([            
            'town_name' => 'Tuhe',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3566',
			'ycooord' => '327',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);	
		//24
		DB::table('towns')->insert([            
            'town_name' => 'Liaoyang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3838',
			'ycooord' => '302',
			'staple_food' => 'soy',
			'category_rebel' => 'Koguryo'
        ]);		
		//towns north of wall
		//25
		DB::table('towns')->insert([            
            'town_name' => 'Shang Gu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2744',
			'ycooord' => '375',
			'staple_food' => 'wheat',
			'category_rebel' => 'Wuhuan'
        ]);	
		//26
		DB::table('towns')->insert([            
            'town_name' => 'Dai Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2677',
			'ycooord' => '529',
			'staple_food' => 'wheat',
			'category_rebel' => 'Wuhuan'			
        ]);	
		//27
		DB::table('towns')->insert([            
            'town_name' => 'Yun Zhong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2446',
			'ycooord' => '572',
			'staple_food' => 'wheat',
			'category_rebel' => 'Wuhuan'			
        ]);	
		//28
		DB::table('towns')->insert([            
            'town_name' => 'Jiu Yuan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2098',
			'ycooord' => '406',
			'staple_food' => 'wheat',
			'category_rebel' => 'Xiongnu'			
        ]);	
		//far west
		//29
		DB::table('towns')->insert([            
            'town_name' => 'Xi Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1062',
			'ycooord' => '795',
			'staple_food' => 'wheat',
			'category_rebel' => 'Yuezhi'			
        ]);	
		//30
		DB::table('towns')->insert([            
            'town_name' => 'Zhang Ye',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '856',
			'ycooord' => '698',
			'staple_food' => 'wheat',
			'category_rebel' => 'Yuezhi'			
        ]);	
		//31
		DB::table('towns')->insert([            
            'town_name' => 'Long You',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1026',
			'ycooord' => '1082',
			'staple_food' => 'wheat',
			'category_rebel' => 'Qiang'			
        ]);
		//far south
		//32
		DB::table('towns')->insert([            
            'town_name' => 'Cang Wu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2306',
			'ycooord' => '2947',
			'category_rebel' => 'Nanyue'			
        ]);	
		//33
		DB::table('towns')->insert([            
            'town_name' => 'Yu Lin',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2102',
			'ycooord' => '3255',
			'category_rebel' => 'Nanyue'			
        ]);	
		//34
		DB::table('towns')->insert([            
            'town_name' => 'He Pu',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2000',
			'ycooord' => '3336',
			'category_rebel' => 'Nanyue'			
        ]);	
		//35
		DB::table('towns')->insert([            
            'town_name' => 'Shi Xing',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2528',
			'ycooord' => '2724',
			'category_rebel' => 'Nanyue'			
        ]);
		//36
		DB::table('towns')->insert([            
            'town_name' => 'Lin He',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2557',
			'ycooord' => '2960',
			'category_rebel' => 'Nanyue'			
        ]);
		//37
		DB::table('towns')->insert([            
            'town_name' => 'Gao Liang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2218',
			'ycooord' => '3304',
			'category_rebel' => 'Nanyue'			
        ]);
		//south
		//38
		DB::table('towns')->insert([            
            'town_name' => 'Chang Sha',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2497',
			'ycooord' => '2395'			
        ]);		
		//39
		DB::table('towns')->insert([            
            'town_name' => 'Wu Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2325',
			'ycooord' => '2271'			
        ]);	
		//40
		DB::table('towns')->insert([            
            'town_name' => 'Ling Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2318',
			'ycooord' => '2683'			
        ]);	
		//41
		DB::table('towns')->insert([            
            'town_name' => 'Gui Yang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2543',
			'ycooord' => '2842'			
        ]);				
		//42
		DB::table('towns')->insert([            
            'town_name' => 'Gui Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2140',
			'ycooord' => '2821'			
        ]);
		//43
		DB::table('towns')->insert([            
            'town_name' => 'Lei Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2477',
			'ycooord' => '2656'			
        ]);
		//44
		DB::table('towns')->insert([            
            'town_name' => 'Zhao Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2298',
			'ycooord' => '2535'			
        ]);
		//45
		DB::table('towns')->insert([            
            'town_name' => 'Xiang Tan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2488',
			'ycooord' => '2448'			
        ]);
		//46
		DB::table('towns')->insert([            
            'town_name' => 'Ba Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2515',
			'ycooord' => '2218'			
        ]);
		//47
		DB::table('towns')->insert([            
            'town_name' => 'An Cheng',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2848',
			'ycooord' => '2266'			
        ]);
		//48
		DB::table('towns')->insert([            
            'town_name' => 'Lu Ling',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2832',
			'ycooord' => '2472'			
        ]);
		//49
		DB::table('towns')->insert([            
            'town_name' => 'Lin Chuang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2936',
			'ycooord' => '2424'			
        ]);
		//50
		DB::table('towns')->insert([            
            'town_name' => 'Jian An',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3226',
			'ycooord' => '2432',
			'category_rebel' => 'Minyue'			
        ]);
		//51
		DB::table('towns')->insert([            
            'town_name' => 'Yan Ping',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3176',
			'ycooord' => '2626',
			'category_rebel' => 'Minyue'			
        ]);
		//52
		DB::table('towns')->insert([            
            'town_name' => 'Nan Chang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2878',
			'ycooord' => '2322'			
        ]);
		//53
		DB::table('towns')->insert([            
            'town_name' => 'Jiu Jiang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2890',
			'ycooord' => '2166'			
        ]);	
		//54
		DB::table('towns')->insert([            
            'town_name' => 'Ba Dong',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2236',
			'ycooord' => '1997'			
        ]);	
		//55
		DB::table('towns')->insert([            
            'town_name' => 'Lin Jiang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1894',
			'ycooord' => '2001'			
        ]);					
		//far southwest
		//56
		DB::table('towns')->insert([            
            'town_name' => 'Jian Wei',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1284',
			'ycooord' => '2189',
			'category_rebel' => 'Qiang'			
        ]);	
		//57, chongqing
		DB::table('towns')->insert([            
            'town_name' => 'Ba Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1645',
			'ycooord' => '2192',
			'category_rebel' => 'Yelang'			
        ]);	
		//58
		DB::table('towns')->insert([            
            'town_name' => 'Zhu Ti',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1420',
			'ycooord' => '2222',
			'category_rebel' => 'Yelang'			
        ]);	
		//59
		DB::table('towns')->insert([            
            'town_name' => 'Yue Juan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1160',
			'ycooord' => '2294',
			'category_rebel' => 'Dianyue'			
        ]);	
		//60
		DB::table('towns')->insert([            
            'town_name' => 'Guang Han',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1557',
			'ycooord' => '1750',
			'category_rebel' => 'Baima'			
        ]);
		//61
		DB::table('towns')->insert([            
            'town_name' => 'De Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1356',
			'ycooord' => '1976',
			'category_rebel' => 'Baima'				
        ]);
		//62
		DB::table('towns')->insert([            
            'town_name' => 'Xi Chang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1090',
			'ycooord' => '2439',
			'category_rebel' => 'Baima'				
        ]);
		//63
		DB::table('towns')->insert([            
            'town_name' => 'Yun Nan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1066',
			'ycooord' => '2842',
			'category_rebel' => 'Dianyue'				
        ]);
		//64
		DB::table('towns')->insert([            
            'town_name' => 'Xing Gu',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1292',
			'ycooord' => '2790',
			'category_rebel' => 'Dianyue'			
        ]);
		//east
		//65
		DB::table('towns')->insert([            
            'town_name' => 'Hui Ji',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3529',
			'ycooord' => '2119'			
        ]);
		//66, suzhou
		DB::table('towns')->insert([            
            'town_name' => 'Wu Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3490',
			'ycooord' => '1924'			
        ]);
		//67
		DB::table('towns')->insert([            
            'town_name' => 'Guang Ling',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3350',
			'ycooord' => '1755'			
        ]);
		//68
		DB::table('towns')->insert([            
            'town_name' => 'Wan Cheng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '3058',
			'ycooord' => '1843'			
        ]);
		//69
		DB::table('towns')->insert([            
            'town_name' => 'Lin Hai',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3564',
			'ycooord' => '2298',
			'category_rebel' => 'Minyue'			
        ]);
		//70
		DB::table('towns')->insert([            
            'town_name' => 'Wen Zhou',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3502',
			'ycooord' => '2426',
			'category_rebel' => 'Minyue'			
        ]);
		//71
		DB::table('towns')->insert([            
            'town_name' => 'Dong Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3446',
			'ycooord' => '2233'			
        ]);
		//72
		DB::table('towns')->insert([            
            'town_name' => 'Fu Chun',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '3425',
			'ycooord' => '2102'			
        ]);
		//73
		DB::table('towns')->insert([            
            'town_name' => 'Yin Shang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2926',
			'ycooord' => '1717'			
        ]);
		//74
		DB::table('towns')->insert([            
            'town_name' => 'Ru Jin',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2870',
			'ycooord' => '1676'			
        ]);
		//75
		DB::table('towns')->insert([            
            'town_name' => 'Gu Shi',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2766',
			'ycooord' => '1797'			
        ]);
		//76
		DB::table('towns')->insert([            
            'town_name' => 'Lu Shan',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '2486',
			'ycooord' => '1584'			
        ]);
		//west
		//77, lanzhou
		DB::table('towns')->insert([            
            'town_name' => 'Jin Cheng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1299',
			'ycooord' => '1175',
			'staple_food' => 'wheat',
			'category_rebel' => 'Qiang'			
        ]);
		//78
		DB::table('towns')->insert([            
            'town_name' => 'Long Xi',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1407',
			'ycooord' => '1344',
			'staple_food' => 'wheat',
			'category_rebel' => 'Qiang'			
        ]);
		//79
		DB::table('towns')->insert([            
            'town_name' => 'Fuping',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1608',
			'ycooord' => '777',
			'staple_food' => 'wheat'
        ]);
		//80
		DB::table('towns')->insert([            
            'town_name' => 'Fu Feng',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1760',
			'ycooord' => '1451',
			'staple_food' => 'wheat'
        ]);
		//centre
		//81
		DB::table('towns')->insert([            
            'town_name' => 'Feng Xiang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2038',
			'ycooord' => '1424',
			'staple_food' => 'wheat'
        ]);
		//82
		DB::table('towns')->insert([            
            'town_name' => 'He Dong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2159',
			'ycooord' => '1268',
			'staple_food' => 'wheat'
        ]);
		//83
		DB::table('towns')->insert([            
            'town_name' => 'Hong Nong',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '2221',
			'ycooord' => '1422',
			'staple_food' => 'wheat'
        ]);
		//yellow river
		//84
		DB::table('towns')->insert([            
            'town_name' => 'Kaifeng',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '2674',
			'ycooord' => '1378',
			'staple_food' => 'wheat'
        ]);
		
    }
}
