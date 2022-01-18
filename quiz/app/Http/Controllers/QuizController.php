<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data\StaticQuiz;
use App\DTO\QuestionDTO;
use App\DTO\QuizDTO;
use App\Service\QuizResultService;

use Exception;


class QuizController extends Controller
{
    public function welcome()
    {
        session()->flush();
        return view('welcome');
    }

    public function quiz($questId)
    {
        if (!session()->has('question' . ($questId - 1) . '.choices') && $questId > 1 || $questId < 1)
            return redirect('sorry');

        $quiz = StaticQuiz::getQuiz();
        $quizCount = $this->service->getCount($quiz);
        if ($questId <= $quizCount) {
            $question = $this->service->getQuestion($quiz, $questId - 1);
            return view('quiz', compact('question'))
                ->with('questId', $questId)
                ->with('quizCount', $quizCount);
        }
        return redirect('/result');
    }

    public function post($questId, Request $request)
    {
        if (empty($request->except('_token', 'questId'))) {
            return redirect()->back()->withErrors(['msg' => 'Необходимо выбрать хотя бы один из вариантов ответа']);
        }

        session()->put("question" . $questId, [
            'questId' => $request->get('questId'),
            'choices' => array_keys($request->except('_token', 'questId'))
        ]);

        return redirect('quiz/' . ++$questId);
    }

    public function getResult()
    {
        try {
            $quiz = StaticQuiz::getQuiz();
            $answers = $this->service->getAnswers($quiz);
            $resultService = new QuizResultService($quiz, $answers);
            $result = 100 * $resultService->getResult();
            return view('result', compact('result'));
        } catch (Exception $e) {
            return redirect('sorry');
        }
    }
}
