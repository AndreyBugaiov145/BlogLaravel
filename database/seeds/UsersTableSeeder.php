<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        	[

        		'name'=>'Oleg',
        		'surname'=>'Oleger',
        		'gender'=>'man',
        		'email'=>'Oleger.Oleger@gmail.com',
        		'password'=>'123'
        	]);
        User::create(
        	[
        		'name'=>'Dima',
        		'surname'=>'Lobov',
        		'gender'=>'man',
        		'email'=>'Dima@gmail.com',
        		'password'=>'123'
        	]);
    }
}
