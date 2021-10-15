<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 100 ; $i++) { 

            for ($j=0; $j < 10 ; $j++) { 
                if($i%5 == 1){
                    $ran = [2,3,4,5];
                    Review::create([
                        'gig_id' => $i,
                        'user_id' => $ran[rand(0,3)],
                        'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptatem veniam quaerat enim, voluptatibus voluptates at consequatur exercitationem, aut sed, sunt explicabo molestias itaque adipisci excepturi suscipit magni laborum! Repellendus.',
                        'star' => rand(1,5),
                    ]);
                }else
                if($i%5 == 2){
                    $ran = [1,3,4,5];
                    Review::create([
                        'gig_id' => $i,
                        'user_id' => $ran[rand(0,3)],
                        'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptatem veniam quaerat enim, voluptatibus voluptates at consequatur exercitationem, aut sed, sunt explicabo molestias itaque adipisci excepturi suscipit magni laborum! Repellendus.',
                        'star' => rand(1,5),
                    ]);
                }else
                if($i%5 == 3){
                    $ran = [1,2,4,5];
                    Review::create([
                        'gig_id' => $i,
                        'user_id' => $ran[rand(0,3)],
                        'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptatem veniam quaerat enim, voluptatibus voluptates at consequatur exercitationem, aut sed, sunt explicabo molestias itaque adipisci excepturi suscipit magni laborum! Repellendus.',
                        'star' => rand(1,5),
                    ]);
                }else
                if($i%5 == 4){
                    $ran = [1,2,3,5];
                    Review::create([
                        'gig_id' => $i,
                        'user_id' => $ran[rand(0,3)],
                        'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptatem veniam quaerat enim, voluptatibus voluptates at consequatur exercitationem, aut sed, sunt explicabo molestias itaque adipisci excepturi suscipit magni laborum! Repellendus.',
                        'star' => rand(1,5),
                    ]);
                }else
                if($i%5 == 0){
                    $ran = [1,2,3,4];
                    Review::create([
                        'gig_id' => $i,
                        'user_id' => $ran[rand(0,3)],
                        'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi voluptatem veniam quaerat enim, voluptatibus voluptates at consequatur exercitationem, aut sed, sunt explicabo molestias itaque adipisci excepturi suscipit magni laborum! Repellendus.',
                        'star' => rand(1,5),
                    ]);
                }
            }
        }
    }
}
