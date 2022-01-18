<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;
use Exception;

class QuizService
{
    public function getQuestion(QuizDTO $quizDTO, $id): array
    {
        $questions = $quizDTO->getQuestions();
        $result['id'] = $questions[$id]->getUUID();
        $result['text'] = $questions[$id]->getText();

        $choices = $questions[$id]->getChoices();
        foreach ($choices as $ch) {
            $choice['id'] = $ch->getUUID();
            $choice['text'] = $ch->getText();
            $result['choices'][] = $choice;
        }
        return $result;
    }

    public function getCount(QuizDTO $quizDTO): int
    {
        $questions = $quizDTO->getQuestions();
        return count($questions);
    }

    public function getAnswers(QuizDTO $quizDTO): AnswersDTO
    {
        $answers = new AnswersDTO($quizDTO->getUUID());
        for ($i = 1; $i <= $this->getCount($quizDTO); $i++) {
            if (session()->has('question' . $i . '.questId')) {
                $answer = new AnswerDTO(session()->get('question' . $i . '.questId'));
                $choices = session()->get('question' . $i . '.choices');
            } else throw new Exception('Error');
            foreach ($choices as $ch) {
                $answer->addChoiceUUID($ch);
            }
            $answers->addAnswer($answer);
        }
        return $answers;
    }
}
