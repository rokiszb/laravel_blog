<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Master User',
            'email' => 'master@master.com',
            'password' => bcrypt('secret'),
        ]);

        $faker = Faker\Factory::create();

    	for ($i=0; $i < 9; $i++) { 
	    	DB::table('posts')->insert([
	            'title' => $faker->sentence($nbWords = 4, $variableNbWords = true) , 
	            'body' => $faker->text,
	            'created_at' => date("Y-m-d h:i:s"),
	            'updated_at' => date("Y-m-d h:i:s"),
	            'author' => 'Master User',
	            'thumbnail' => 'blog_pic.png',
	            'user_id' => 1
	        ]);

    	}
    }
}
