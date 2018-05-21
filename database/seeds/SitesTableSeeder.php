<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SitesTableSeeder extends Seeder {
	
	public function run()
	{
		DB::table('sites')->insert([
			'public_key' => 'BA1y3AObZ49PKiKY4VKebNVsSGTJRvb_3uYLXOa6-OwDpNVOu5C8NLWgh__7gqMQq-wzud8C60xG28uquHNQHJY',
			'private_key' => 'b-yietXh1Ueyp07K4OSjx231yasSgeFj6GIYIfiblNo',
			'site' => 'dev.racingjunk.com',
			'active' => 1
		]);
	}	
}