<?php

namespace Database\Seeders;

use App\Models\Gig;
use Illuminate\Database\Seeder;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $category = ['Graphics & Design','Digital Marketing','Writing & Translation','Video & Animation','Music & Animation','Music & Audio','Programming & Tech','Data','Business','Lifestyle'];
        for ($i=0; $i < 100 ; $i++) { 

            if($i%5 == 0){

                Gig::create([
                    'user_id' => 1,
                    'title' => substr(str_shuffle($permitted_chars), 0, 16).' '.substr(str_shuffle($permitted_chars), 0, 16),
                    'category' => $category[rand(0,9)],
                    'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique facilis dolore eos maiores corporis expedita modi hic, enim in at odit eveniet fuga libero ea, nisi ad. Eum, quaerat modi.',
                    'basic_price' => rand(1,100),
                    'basic_description' => 'this is basic price',
                    'standard_price' => rand(100,500),
                    'standard_description' => 'this is standard price',
                    'premium_price' => rand(500,1000),
                    'premium_description' => 'this is premium price',
                    'images' => 'headphone.jfif'
                ]);
            }else
            if($i%5 == 1){
                
                Gig::create([
                    'user_id' => 2,
                    'title' => substr(str_shuffle($permitted_chars), 0, 16).' '.substr(str_shuffle($permitted_chars), 0, 16),
                    'category' => $category[rand(0,9)],
                    'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique facilis dolore eos maiores corporis expedita modi hic, enim in at odit eveniet fuga libero ea, nisi ad. Eum, quaerat modi.',
                    'basic_price' => rand(1,100),
                    'basic_description' => 'this is basic price',
                    'standard_price' => rand(100,500),
                    'standard_description' => 'this is standard price',
                    'premium_price' => rand(500,1000),
                    'premium_description' => 'this is premium price',
                    'images' => 'headphone.jfif'
                ]);
            }else
            if($i%5 == 2){
                
                Gig::create([
                    'user_id' => 3,
                    'title' => substr(str_shuffle($permitted_chars), 0, 16).' '.substr(str_shuffle($permitted_chars), 0, 16),
                    'category' => $category[rand(0,9)],
                    'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique facilis dolore eos maiores corporis expedita modi hic, enim in at odit eveniet fuga libero ea, nisi ad. Eum, quaerat modi.',
                    'basic_price' => rand(1,100),
                    'basic_description' => 'this is basic price',
                    'standard_price' => rand(100,500),
                    'standard_description' => 'this is standard price',
                    'premium_price' => rand(500,1000),
                    'premium_description' => 'this is premium price',
                    'images' => 'headphone.jfif'
                ]);
            }else
            if($i%5 == 3){
                
                Gig::create([
                    'user_id' => 4,
                    'title' => substr(str_shuffle($permitted_chars), 0, 16).' '.substr(str_shuffle($permitted_chars), 0, 16),
                    'category' => $category[rand(0,9)],
                    'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique facilis dolore eos maiores corporis expedita modi hic, enim in at odit eveniet fuga libero ea, nisi ad. Eum, quaerat modi.',
                    'basic_price' => rand(1,100),
                    'basic_description' => 'this is basic price',
                    'standard_price' => rand(100,500),
                    'standard_description' => 'this is standard price',
                    'premium_price' => rand(500,1000),
                    'premium_description' => 'this is premium price',
                    'images' => 'headphone.jfif'
                ]);
            }else
            if($i%5 == 4){
                
                Gig::create([
                    'user_id' => 5,
                    'title' => substr(str_shuffle($permitted_chars), 0, 16).' '.substr(str_shuffle($permitted_chars), 0, 16),
                    'category' => $category[rand(0,9)],
                    'about' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique facilis dolore eos maiores corporis expedita modi hic, enim in at odit eveniet fuga libero ea, nisi ad. Eum, quaerat modi.',
                    'basic_price' => rand(1,100),
                    'basic_description' => 'this is basic price',
                    'standard_price' => rand(100,500),
                    'standard_description' => 'this is standard price',
                    'premium_price' => rand(500,1000),
                    'premium_description' => 'this is premium price',
                    'images' => 'headphone.jfif'
                ]);
            }
        }
    }
}
