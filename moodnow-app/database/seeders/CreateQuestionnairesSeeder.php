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
               'question'=>'Apakah kamu merasa senang?',
               'mood'=>'Senang',
               'output'=>'mood_baik'
            ],
            [
               'question'=>'Apakah kamu merasa cemas atau tertekan?',
               'mood'=>'Cemas',
               'output'=>'mood_buruk'
            ],
            [
               'question'=>'Apakah kamu merasa bosan?',
               'mood'=>'Bosen',
               'output'=>'mood_buruk'
            ],
            [
               'question'=>'Apakah kamu merasa lelah atau letih?',
               'mood'=>'Lelah',
               'output'=>'mood_buruk'
            ],
            [
               'question'=>'Apakah kamu merasa terhibur?',
               'mood'=>'Bahagia',
               'output'=>'mood_baik'
            ],
            [
               'question'=>'Apakah kamu merasa marah?',
               'mood'=>'Marah',
               'output'=>'mood_buruk'
            ],
        ];
    
        foreach ($quizs as $key => $quiz) {
            Questionnaire::create($quiz);
        }
    }
}
