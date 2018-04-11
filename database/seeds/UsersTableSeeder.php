<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::table('users')->delete();
        DB::table('users')->insert(array(
            array('name'=>'andreea','email'=>'andreea@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'mark','email'=>'mark@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'Karl','email'=>'karl@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'marl','email'=>'marl@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'mary','email'=>'mary@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'sels','email'=>'sels@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'taylor','email'=>'taylor@hello.com','password'=>'test123','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),

         ));
    }
}