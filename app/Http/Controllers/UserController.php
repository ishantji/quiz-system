<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;


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
        $mcqs = Mcq::where('quiz_id',$id)->get();
        Session::put('firstMCQ',$mcqs[0]);
        //return $quizData[0]->id;
        $quizName = $name;
        return view('start-quiz',['quizCount' => $quizCount,'quizName' => $quizName,'quizId' => $id]);
    }

    function userSignup(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required | min:3',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:3 | confirmed',
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user) {
            Session::put('user',$user);
            if(Session::has('quiz_url')){
                $url = Session::get('quiz_url');
                Session::forget('quiz_url');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    function userLogout()
    {
        Session::forget('user');
        return redirect('/');
    }

    function userSignupQuiz()
    {
        Session::put('quiz_url',url()->previous());
        return view('/user-signup');
    }

    function userLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();

        $user = User::where([
            'email' => $request->email,
        ])->first();

        if(!$user || !Hash::check($request->password,$user->password)) {
            return "User not valid, Please check email and password again";
        }
        
        if($user) {
            Session::put('user',$user);
            if(Session::has('quiz_url')){
                $url = Session::get('quiz_url');
                Session::forget('quiz_url');
                return redirect($url);
            }
            return redirect('/');
        }
    }

    function userLoginQuiz()
    {
        Session::put('quiz_url',url()->previous());
        return view('/user-login');
    }

    function mcq($id,$name)
    {
        $currentQuiz = [];
        $currentQuiz['totalMcq']=MCQ::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
        $currentQuiz['currentMcq']=1;
        $currentQuiz['quizname']=$name;
        $currentQuiz['quizId']=Session('firstMCQ')->quiz_id;
        Session::put('currentQuiz',$currentQuiz);
        $mcqData=MCQ::find($id);
        return view('mcq-page',['quizName' => $name,'mcqData'=>$mcqData]);
    }

    function submitAndNext($id){
        $currentQuiz = Session::get('currentQuiz');
        $currentQuiz['currentMcq']+=1;
        $mcqData = MCQ::where([
            ['id','>',$id],
            ['quiz_id','=',$currentQuiz['quizId']]
        ])->first();
        Session::put('currentQuiz',$currentQuiz);
        if($mcqData){
            return view('mcq-page',['quizName' => $currentQuiz['quizname'],'mcqData'=>$mcqData]);
        } else {
            return 'result Page';
        }
    }
}
