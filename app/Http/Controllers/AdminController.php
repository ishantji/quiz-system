<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function deleteCategory($id){
        $isDeleted = Category::find($id)->delete();
        if($isDeleted) {
          Session::flash('category', 'Success : Category has been deleted.');
          return redirect('admin-categories');
        }
    }
}
