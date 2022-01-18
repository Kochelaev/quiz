<?php

namespace App\Data;

use App\DTO\ChoiceDTO;
use App\DTO\QuestionDTO;
use App\DTO\QuizDTO;

class StaticQuiz
{
    static public function getQuiz(): QuizDTO
    {
        $choice11 = new ChoiceDTO(
            '1-1-1',
            'Структурное программирование',
            false
        );

        $choice12 = new ChoiceDTO(
            '1-1-2',
            'Системное программирование',
            true
        );

        $choice13 = new ChoiceDTO(
            '1-1-3',
            'Функциональное программирование',
            false
        );

        $choice14 = new ChoiceDTO(
            '1-1-4',
            'Объектно-ориентированое программирование',
            false
        );

        $question1 = new QuestionDTO(
            '1-1',
            'Какие из представленных парадигм программирования не существуют?'
        );

        $question1->addChoice($choice11);
        $question1->addChoice($choice12);
        $question1->addChoice($choice13);
        $question1->addChoice($choice14);

        $choice21 = new ChoiceDTO(
            '1-2-1',
            'согласующие',
            true
        );

        $choice22 = new ChoiceDTO(
            '1-2-2',
            'порождающие',
            false
        );

        $choice23 = new ChoiceDTO(
            '1-2-3',
            'поведенческие',
            false
        );

        $choice24 = new ChoiceDTO(
            '1-2-4',
            'структурные',
            false
        );
        $question2 = new QuestionDTO(
            '1-2',
            'Паттернов проектирования какого типа не существует?'
        );

        $question2->addChoice($choice21);
        $question2->addChoice($choice22);
        $question2->addChoice($choice23);
        $question2->addChoice($choice24);

        $choice31 = new ChoiceDTO(
            '1-3-1',
            'Digital divide data',
            true
        );

        $choice32 = new ChoiceDTO(
            '1-3-2',
            'Domen driven design',
            false
        );

        $choice33 = new ChoiceDTO(
            '1-3-3',
            'Behavior driven development',
            false
        );

        $choice34 = new ChoiceDTO(
            '1-3-4',
            'Test driven development',
            false
        );

        $question3 = new QuestionDTO(
            '1-3',
            'Что из этого не является методологией разработки ПО?'
        );

        $question3->addChoice($choice31);
        $question3->addChoice($choice32);
        $question3->addChoice($choice33);
        $question3->addChoice($choice34);

        $choice41 = new ChoiceDTO(
            '1-4-1',
            'DRY (don\'t repeat yourself)',
            false
        );

        $choice42 = new ChoiceDTO(
            '1-4-2',
            'KISS (keep it simple, stupid)',
            false
        );

        $choice43 = new ChoiceDTO(
            '1-4-3',
            'DIP (dependency inversion principle)',
            true
        );

        $choice44 = new ChoiceDTO(
            '1-4-4',
            'ISP (interface segregation principle)',
            true
        );

        $question4  = new QuestionDTO(
            '1-4',
            'Какие принципы разработи программного обеспечения относяться к принципам SOLID?'
        );

        $question4->addChoice($choice41);
        $question4->addChoice($choice42);
        $question4->addChoice($choice43);
        $question4->addChoice($choice44);

        $choice51 = new ChoiceDTO(
            '1-5-1',
            '__wakeup()',
            true
        );

        $choice52 = new ChoiceDTO(
            '1-5-2',
            '__debug()',
            false
        );

        $choice53 = new ChoiceDTO(
            '1-5-3',
            '__call()',
            true
        );

        $choice54 = new ChoiceDTO(
            '1-5-4',
            '__string()',
            false
        );

        $question5  = new QuestionDTO(
            '1-5',
            'Какие "магические" методы существуют в PHP?'
        );

        $question5->addChoice($choice51);
        $question5->addChoice($choice52);
        $question5->addChoice($choice53);
        $question5->addChoice($choice54);

        $quiz = new QuizDTO(
            '1',
            'Programming'
        );

        $quiz->addQuestion($question1);
        $quiz->addQuestion($question2);
        $quiz->addQuestion($question3);
        $quiz->addQuestion($question4);
        $quiz->addQuestion($question5);

        return $quiz;
    }
}
