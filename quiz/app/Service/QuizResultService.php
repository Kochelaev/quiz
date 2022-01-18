<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;

use Exception;

class QuizResultService
{
    private QuizDTO $quiz;
    private AnswersDTO $answers;

    public function __construct(QuizDTO $quiz, AnswersDTO $answers)
    {
        $this->quiz = $quiz;
        $this->answers = $answers;
    }

    public function getResult(): float
    {

        $userAnswers = $this->answers->getAnswers();
        foreach ($userAnswers as $answer) {
            $questionId = $answer->getQuestionUUID();
            $choice = $answer->getСhoices();
            foreach ($choice as $ch) {
                $userChoices[$questionId][$ch] = true;
            }
        }

        $questionCount = 0;
        $questions = $this->quiz->getQuestions();
        $trueCount = 0;
        foreach ($questions as $question) {
            $questionCount++;
            $questionId = $question->getUUID();
            $choices = $question->getChoices();
            $isCorrectAnswer = 1;
            foreach ($choices as $ch) {
                $ChoiceId = $ch->getUUID();
                if ($ch->isCorrect()) {
                    if (empty($userChoices[$questionId][$ChoiceId])) {
                        $isCorrectAnswer = 0;
                    }
                } else if (!empty($userChoices[$questionId][$ChoiceId])) {
                    $isCorrectAnswer = 0;
                }
            }
            $trueCount += $isCorrectAnswer;
        }
        return round($trueCount / $questionCount, 2);
    }
}
