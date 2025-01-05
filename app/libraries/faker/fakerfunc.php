<?php

// use Faker\Factory;
// class Faker {
//     private $name;
//     private $gmail;

//     public function __construct() {
//         $this->faker = Factory::create("id_ID");
//     }

//     public function getDummyName() {
//         return $this->name;
//     }

//     public function getDummyGmail() {
//         return $this->gmail;
//     }
// }

// ________________________________________________________________________________________

// fungsi ini bisa digunakan/d  di semua controller didalam folder controller

require_once 'vendor/autoload.php';
$faker = Faker\Factory::create("id_ID");

function getDummyName(){
    global $faker;
    return $faker->name;
}
function getDummyEmail(){
    global $faker;
    return $faker->email;
}
function getDummyAddress(){
    global $faker;
    return $faker->name;
}







