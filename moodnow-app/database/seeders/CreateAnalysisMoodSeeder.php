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
            ],
            [
                'id' => 2,
               'logic'=>'logic_2',
            ],
            [
                'id' => 3,
               'logic'=>'logic_3',
            ],
            [
                'id' => 4,
               'logic'=>'logic_4',
            ],
        ];
    
        foreach ($analysisMoods as $key => $analysisMood) {
            AnalysisMood::create($analysisMood);
        }
    }
}
