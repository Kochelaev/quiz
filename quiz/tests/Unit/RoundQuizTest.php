<?php

namespace Tests\Unit;

use App\DTO\ChoiceDTO;
use App\DTO\QuestionDTO;
use App\DTO\QuizDTO;
use App\DTO\AnswerDTO;
use App\DTO\AnswersDTO;
use App\Service\QuizResultService;
use PHPUnit\Framework\TestCase;

class RoundQuizTest  extends TestCase
{
    protected $quizDTO;
    protected $answersDTO;

    protected function setUp(): void
    {
        $this->quizDTO = $this->makeQuizDTO();
        $this->answersDTO = $this->makeAnswersDTO();
    }

    public function testRoundTest()
    {

        $quizResultService = new QuizResultService(
            $this->quizDTO,
            $this->answersDTO
        );

        $result = $quizResultService->getResult();

        $this->assertEquals(0.67, $result);
    }

    protected function makeQuizDTO(): QuizDTO
    {
        $choice11 = new ChoiceDTO(
            '1-1-1',
            'True',
            true
        );

        $choice12 = new ChoiceDTO(
            '1-1-2',
            'False',
            false
        );

        $question1 = new QuestionDTO(
            '1-1',
            'True or False?'
        );

        $question1->addChoice($choice11);
        $question1->addChoice($choice12);

        $choice21 = new ChoiceDTO(
            '1-2-1',
            'True',
            true
        );

        $choice22 = new ChoiceDTO(
            '1-2-2',
            'False',
            false
        );

        $question2 = new QuestionDTO(
            '1-2',
            'True or False?'
        );

        $question2->addChoice($choice21);
        $question2->addChoice($choice22);

        $choice31 = new ChoiceDTO(
            '1-3-1',
            'True',
            true
        );

        $choice32 = new ChoiceDTO(
            '1-3-2',
            'False',
            false
        );

        $question3 = new QuestionDTO(
            '1-3',
            'True or False?'
        );

        $question3->addChoice($choice31);
        $question3->addChoice($choice32);


        $quiz = new QuizDTO(
            '1',
            'Round'
        );

        $quiz->addQuestion($question1);
        $quiz->addQuestion($question2);
        $quiz->addQuestion($question3);

        return $quiz;
    }

    protected function makeAnswersDTO(): AnswersDTO
    {
        $answers = new AnswersDTO(
            $this->quizDTO->getUUID()
        );

        $questions = $this->quizDTO->getQuestions();

        //correct answer
        $answer1 = new AnswerDTO($questions[0]->getUUID());
        $choices1 = $questions[0]->getChoices();
        $answer1->addChoiceUUID($choices1[0]->getUUID());
        $answers->addAnswer($answer1);

        //correct answer
        $answer2 = new AnswerDTO($questions[1]->getUUID());
        $choices2 = $questions[1]->getChoices();
        $answer2->addChoiceUUID($choices2[0]->getUUID());
        $answers->addAnswer($answer2);

        //wrong answer
        $answer3 = new AnswerDTO($questions[2]->getUUID());
        $choices3 = $questions[2]->getChoices();
        $answer3->addChoiceUUID($choices3[1]->getUUID());
        $answers->addAnswer($answer3);

        return $answers;
    }
}
