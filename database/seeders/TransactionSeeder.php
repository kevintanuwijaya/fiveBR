<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = ['Basic','Standard','Premium'];
        for ($j=1; $j < 100 ; $j++) { 
            
            if($j%5 == 0){
                $ran = [1,2,3,4];
                Transaction::create([
                    'user_id' => $ran[rand(0,3)],
                    'gig_id' => $j,
                    'type' => $type[rand(0,2)],
                ]);
            }else
            if($j%5 == 1){
                $ran = [2,3,4,5];
                Transaction::create([
                    'user_id' => $ran[rand(0,3)],
                    'gig_id' => $j,
                    'type' => $type[rand(0,2)],
                ]);
            }else
            if($j%5 == 2){
                $ran = [1,3,4,5];
                Transaction::create([
                    'user_id' => $ran[rand(0,3)],
                    'gig_id' => $j,
                    'type' => $type[rand(0,2)],
                ]);
            }else
            if($j%5 == 3){
                $ran = [1,2,4,5];
                Transaction::create([
                    'user_id' => $ran[rand(0,3)],
                    'gig_id' => $j,
                    'type' => $type[rand(0,2)],
                ]);
            }else
            if($j%5 == 4){
                $ran = [1,2,3,5];
                Transaction::create([
                    'user_id' => $ran[rand(0,3)],
                    'gig_id' => $j,
                    'type' => $type[rand(0,2)],
                ]);
            }    
        }
        
    }
}
