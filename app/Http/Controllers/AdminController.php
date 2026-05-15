<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        // Validation
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Search user with name & password in admin table
        $admin = Admin::where([
            ['name', '=', $request->name],
            ['password', '=', $request->password],
        ])->first();

        // If no user found
        if (! $admin) {
            $validation = $request->validate([
                'user' => 'required',
            ], [
                // Custom validation
                'user.required' => 'User does not exist',
            ]);
        }

        // Create session with admin name
        Session::put('admin', $admin);

        // Redirect to dashboard
        return redirect('/dashboard');
    }

    public function dashboard()
    {
        // Get session with admin name
        $admin = Session::get('admin');
        if ($admin) {
            return view('admin', ['name' => $admin->name]);
        } else {
            return redirect('/admin-login');
        }
    }

    public function categories()
    {
        $admin = Session::get('admin');
        $categories = Category::all();
        //dd($categories);
        // foreach($categories as $category) {
        //     echo $category->name;
        // }
        if ($admin) {
            return view('categories', ['name' => $admin->name,'categories' => $categories]);
        } else {
            return redirect('/admin-login');
        }
    }

    public function logout()
    {
        // Forget session with admin name
        Session::forget('admin');
        return redirect('/admin-login');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'category' => 'required | min:3 | unique:categories,name'
        ]);
        $admin = Session::get('admin');
        $creator = $admin->name;

       // dd($request->category);

        // Method by which category model must be fillable
        // Category::create([
        //     'name' => $request->category,
        //     'creator'=> $creator,
        // ]);

        // Or other method directly save data
        $category = new Category();
        $category->name = $request->category;
        $category->creator = $creator;
        if($category->save()) {
            Session::flash('category', 'Success : Category '.$request->category.' Added.');
        }

        return redirect('admin-categories');
    }

    public function deleteCategory($id)
    {
        $isDeleted = Category::find($id)->delete();
        if($isDeleted) {
          Session::flash('category', 'Success : Category has been deleted.');
          return redirect('admin-categories');
        }
    }

    public function addQuiz()
    {
        //return Session::get('quizDetails');
        $admin = Session::get('admin');

        //use get for fetch all data
        $categories = Category::get();
        if($admin) {
            $quizName = request('quiz');
            $category_id = request('category_id');

            if($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails',$quiz);
                }
            }
            
            return view('add-quiz',['name' => $admin->name,'categories' => $categories]);
        } else {
             return redirect('/admin-login');
        }
    }

    public function addMCQs(Request $request)
    {
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq = new Mcq();
        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;
        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;
        if($mcq->save()) {
            if($request->submit == 'add_more') {
                return redirect(url()->previous()); 
            } else {
                Session::forget('quizDetails');
                return redirect('/admin-categories');
            }
        }
    }
}
