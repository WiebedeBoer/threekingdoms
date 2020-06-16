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
		//2, hex mark, horse,
		DB::table('items')->insert([            
            'type' => '2',  
            'location' => '1'
        ]);	
		//3, gray lightning, horse,
		DB::table('items')->insert([            
            'type' => '3',  
            'location' => '1'
        ]);	
		//4, shadow runner, horse,
		DB::table('items')->insert([            
            'type' => '4',  
            'location' => '1'
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
		//7,
		DB::table('items')->insert([            
            'type' => '7',  
            'location' => '1'
        ]);	
		//8,
		DB::table('items')->insert([            
            'type' => '8',  
            'location' => '1'
        ]);	
		//9,
		DB::table('items')->insert([            
            'type' => '9',  
            'location' => '1'
        ]);	
		//10,
		DB::table('items')->insert([            
            'type' => '10',  
            'location' => '1'
        ]);	
		//11,
		DB::table('items')->insert([            
            'type' => '11',  
            'location' => '1'
        ]);	
		//12,
		DB::table('items')->insert([            
            'type' => '12',  
            'location' => '1'
        ]);	
		//13,
		DB::table('items')->insert([            
            'type' => '13',  
            'location' => '1'
        ]);	
		//14,
		DB::table('items')->insert([            
            'type' => '14',  
            'location' => '1'
        ]);	
		//15,
		DB::table('items')->insert([            
            'type' => '15',  
            'location' => '1'
        ]);	
		//16,
		DB::table('items')->insert([            
            'type' => '16',  
            'location' => '1'
        ]);	
		//17, Art of War, book, 
		DB::table('items')->insert([            
            'type' => '17',  
            'location' => '1'
        ]);	
		//18, Scrolls of Taigong, book,
		DB::table('items')->insert([            
            'type' => '18',  
            'location' => '1'
        ]);	
		//19, Tao Te Ching, book,
		DB::table('items')->insert([            
            'type' => '19',  
            'location' => '1'
        ]);	
		//20, Classic of Poetry, book,
		DB::table('items')->insert([            
            'type' => '20',  
            'location' => '1'
        ]);	
		//21, book of documents, book,
		DB::table('items')->insert([            
            'type' => '21',  
            'location' => '1'
        ]);	
		//22, book of rites, book,
		DB::table('items')->insert([            
            'type' => '22',  
            'location' => '1'
        ]);	
		//23, Spring and Autumn Annals, book,
		DB::table('items')->insert([            
            'type' => '23',  
            'location' => '1'
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
		//provincial capitals
		//1
		DB::table('towns')->insert([            
            'town_name' => 'Chang An',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcooord' => '1',
			'ycooord' => '1', 
			'jade' => 'yes',
			'censer' => 'yes',
			'fabrics' => 'yes'
        ]);
		//2
		DB::table('towns')->insert([            
            'town_name' => 'Luo Yang',
            'population' => '240000',  
            'category_size' => 'legendary', 
            'xcooord' => '1',
			'ycooord' => '1',
			'censer' => 'yes',
			'paintings' => 'yes'
        ]);
		//3
		DB::table('towns')->insert([            
            'town_name' => 'Ru Nan',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//4
		DB::table('towns')->insert([            
            'town_name' => 'Huai Nan',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//5
		DB::table('towns')->insert([            
            'town_name' => 'An Ping',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//6
		DB::table('towns')->insert([            
            'town_name' => 'Lin Zi',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//7
		DB::table('towns')->insert([            
            'town_name' => 'Fan Yang',
            'population' => '90000',  
            'category_size' => 'remarkable', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//8
		DB::table('towns')->insert([            
            'town_name' => 'Jin Yang',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//9
		DB::table('towns')->insert([            
            'town_name' => 'Jian Ye',
            'population' => '120000',  
            'category_size' => 'large', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//10
		DB::table('towns')->insert([            
            'town_name' => 'Xia',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//11
		DB::table('towns')->insert([            
            'town_name' => 'Nan Jun',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//12
		DB::table('towns')->insert([            
            'town_name' => 'Jiang Ning',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//13
		DB::table('towns')->insert([            
            'town_name' => 'Cheng Du',
            'population' => '150000',  
            'category_size' => 'huge', 
            'xcooord' => '1',
			'ycooord' => '1',
			'fabrics' => 'yes',
			'lacquerware' => 'yes'			
        ]);
		//14
		DB::table('towns')->insert([            
            'town_name' => 'Peng Cheng',
            'population' => '30000',  
            'category_size' => 'small', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
		//15
		DB::table('towns')->insert([            
            'town_name' => 'Tian Shui',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1',
			'lacquerware' => 'yes'
        ]);
		//16
		DB::table('towns')->insert([            
            'town_name' => 'Xi Liang',
            'population' => '60000',  
            'category_size' => 'medium', 
            'xcooord' => '1',
			'ycooord' => '1' 
        ]);
    }
}
