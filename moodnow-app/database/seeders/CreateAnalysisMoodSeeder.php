<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnalysisMood;

class CreateAnalysisMoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $analysisMoods = [
            [
                'id' => 1,
                'logic'=>'logic_1',
                'quiz_1'=>'yes',
                'quiz_2'=>'yes',
                'quiz_3'=>'yes',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 2,
                'logic'=>'logic_2',
                'quiz_1'=>'yes',
                'quiz_2'=>'yes',
                'quiz_3'=>'yes',
                'quiz_4'=>'no',
            ],
            [
                'id' => 3,
                'logic'=>'logic_3',
                'quiz_1'=>'yes',
                'quiz_2'=>'yes',
                'quiz_3'=>'no',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 4,
                'logic'=>'logic_4',
                'quiz_1'=>'yes',
                'quiz_2'=>'yes',
                'quiz_3'=>'no',
                'quiz_4'=>'no',
            ],
            [
                'id' => 5,
                'logic'=>'logic_5',
                'quiz_1'=>'yes',
                'quiz_2'=>'no',
                'quiz_3'=>'yes',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 6,
                'logic'=>'logic_6',
                'quiz_1'=>'yes',
                'quiz_2'=>'no',
                'quiz_3'=>'yes',
                'quiz_4'=>'no',
            ],
            [
                'id' => 7,
                'logic'=>'logic_7',
                'quiz_1'=>'yes',
                'quiz_2'=>'no',
                'quiz_3'=>'no',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 8,
                'logic'=>'logic_8',
                'quiz_1'=>'yes',
                'quiz_2'=>'no',
                'quiz_3'=>'no',
                'quiz_4'=>'no',
            ],
            [
                'id' => 9,
                'logic'=>'logic_9',
                'quiz_1'=>'no',
                'quiz_2'=>'yes',
                'quiz_3'=>'yes',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 10,
                'logic'=>'logic_10',
                'quiz_1'=>'no',
                'quiz_2'=>'yes',
                'quiz_3'=>'yes',
                'quiz_4'=>'no',
            ],
            [
                'id' => 11,
                'logic'=>'logic_11',
                'quiz_1'=>'no',
                'quiz_2'=>'yes',
                'quiz_3'=>'no',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 12,
                'logic'=>'logic_12',
                'quiz_1'=>'no',
                'quiz_2'=>'yes',
                'quiz_3'=>'no',
                'quiz_4'=>'no',
            ],
            [
                'id' => 13,
                'logic'=>'logic_13',
                'quiz_1'=>'no',
                'quiz_2'=>'no',
                'quiz_3'=>'yes',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 14,
                'logic'=>'logic_14',
                'quiz_1'=>'no',
                'quiz_2'=>'no',
                'quiz_3'=>'yes',
                'quiz_4'=>'no',
            ],
            [
                'id' => 15,
                'logic'=>'logic_15',
                'quiz_1'=>'no',
                'quiz_2'=>'no',
                'quiz_3'=>'no',
                'quiz_4'=>'yes',
            ],
            [
                'id' => 16,
                'logic'=>'logic_16',
                'quiz_1'=>'no',
                'quiz_2'=>'no',
                'quiz_3'=>'no',
                'quiz_4'=>'no',
            ],
        ];
    
        foreach ($analysisMoods as $key => $analysisMood) {
            AnalysisMood::create($analysisMood);
        }
    }
}
