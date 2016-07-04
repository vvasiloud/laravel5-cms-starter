<?php

use Illuminate\Database\Seeder;

class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('configuration')->delete();
		DB::table('configuration')->insert(
			array(
				array('name' => 'website_title', 'value' => 'Website Name'),
				array('name' => 'website_subtitle', 'value' => 'Subtitle'),			
				array('name' => 'recent_posts', 'value' => 5),
				array('name' => 'administrator_email', 'value' => 'example@example.com')
			)
		);
    }
}
