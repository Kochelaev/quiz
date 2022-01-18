<?php

namespace Tests\Unit;

use App\DTO\AnswerDTO;
use App\DTO\AnswersDTO;
use App\Service\QuizResultService;
use PHPUnit\Framework\TestCase;
use App\Data\StaticQuiz;

class ImprovedQuizTest extends TestCase
{
    protected $quizDTO;
    protected $answersDTO;

    protected function setUp(): void
    {
        $this->quizDTO = StaticQuiz::getQuiz();
        $this->answersDTO = $this->makeAnswersDTO();
    }

    public function testImprovedTest()
    {
        $quizResultService = new QuizResultService(
            $this->quizDTO,
            $this->answersDTO
        );

        $result = $quizResultService->getResult();

        $this->assertEquals(0.20, $result);
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
        $answer1->addChoiceUUID($choices1[1]->getUUID());
        $answers->addAnswer($answer1);

        //wrong answer
        $answer2 = new AnswerDTO($questions[1]->getUUID());
        $choices2 = $questions[1]->getChoices();
        $answer2->addChoiceUUID($choices2[0]->getUUID());
        $answer2->addChoiceUUID($choices2[2]->getUUID());
        $answers->addAnswer($answer2);

        //wrong answer
        $answer3 = new AnswerDTO($questions[2]->getUUID());
        $choices3 = $questions[2]->getChoices();
        $answer3->addChoiceUUID($choices3[1]->getUUID());
        $answer3->addChoiceUUID($choices3[2]->getUUID());
        $answer3->addChoiceUUID($choices3[3]->getUUID());
        $answers->addAnswer($answer3);

        //wrong answer
        $answer4 = new AnswerDTO($questions[3]->getUUID());
        $choices4 = $questions[3]->getChoices();
        $answer4->addChoiceUUID($choices4[2]->getUUID());
        $answers->addAnswer($answer4);

        //wrong answer
        $answer5 = new AnswerDTO($questions[4]->getUUID());
        $choices5 = $questions[4]->getChoices();
        $answer5->addChoiceUUID($choices5[0]->getUUID());
        $answer5->addChoiceUUID($choices5[1]->getUUID());
        $answer5->addChoiceUUID($choices5[2]->getUUID());
        $answers->addAnswer($answer5);

        return $answers;
    }
}
