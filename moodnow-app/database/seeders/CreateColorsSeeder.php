<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class CreateColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
               'quiz_id'=>1,
               'name' => 'Kuning',
               'hex' => '#f6ff00',
               'mood'=>'Senang',
               'output'=>'mood_baik'
            ],
            [
               'quiz_id'=>3,
               'name' => 'Tosca',
               'hex' => '#00ffc8',
               'mood'=>'Bosen',
               'output'=>'mood_buruk'
            ],
            [
               'quiz_id'=>5,
               'name' => 'Biru',
               'hex' => '#0066ff',
               'mood'=>'Bahagia',
               'output'=>'mood_baik'
            ],
            [
               'quiz_id'=>6,
               'name' => 'Merah',
               'hex' => '#ff0000',
               'mood'=>'Marah',
               'output'=>'mood_buruk'
            ],
        ];
    
        foreach ($colors as $key => $color) {
            Color::create($color);
        }
    }
}
