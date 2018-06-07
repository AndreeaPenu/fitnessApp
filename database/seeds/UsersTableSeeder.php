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
            array('name'=>'andreea','gender'=>'F','age'=>'25','height'=>'170','email'=>'andreea@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'mark','gender'=>'M','age'=>'25','height'=>'170','email'=>'mark@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'Karl','gender'=>'M','age'=>'25','height'=>'170','email'=>'karl@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'marl','gender'=>'M','age'=>'25','height'=>'170','email'=>'marl@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'mary','gender'=>'F','age'=>'25','height'=>'170','email'=>'mary@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'sels','gender'=>'M','age'=>'25','height'=>'170','email'=>'sels@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),
            array('name'=>'taylor','gender'=>'F','age'=>'25','height'=>'170','email'=>'taylor@hello.com','password'=>'$2y$10$IHG9SR8O2ruoC9UHhkizp.a11oIcM88NROugMIOHFMjkagf2R7TCi','created_at'=>'2018-04-10 13:24:14', 'updated_at'=>'2018-04-10 13:24:14'),

         ));
    }
}
