<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Questionnaire;

class CreateQuestionnairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizs = [
            [
                'id'=>1,
               'title'=>'pertanyaan 1',
            ],
            [
                'id'=>2,
               'title'=>'pertanyaan 2',
            ],
            [
                'id'=>3,
               'title'=>'pertanyaan 3',
            ],
            [
                'id'=>4,
               'title'=>'pertanyaan 4',
            ],
        ];
    
        foreach ($quizs as $key => $quiz) {
            Questionnaire::create($quiz);
        }
    }
}
