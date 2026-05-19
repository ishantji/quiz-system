<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;


class UserController extends Controller
{
    function welcome()
    {
        $categories = Category::withCount('quizzes')->get();
        return view('welcome', ['categories' => $categories]);
    }

    function userQuizList($id, $category)
    {
        $quizData = Quiz::withCount('mcq')->where('category_id',$id)->get();
        return view('/user-quiz-list', ['quizData' => $quizData,'category' => $category]);
    }

    function startQuiz($id, $name)
    {
        $quizCount = Mcq::where('quiz_id',$id)->count();
        $quizName = $name;
        return view('start-quiz',['quizCount' => $quizCount,'quizName' => $quizName]);
    }
}
