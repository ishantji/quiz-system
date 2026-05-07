<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function login(Request $request) {
        //validation
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where([
            ['name','=',$request->name],
            ['password','=',$request->password],
        ])->first();
        // if no user found
        if(!$admin){
           $validation = $request->validate([
            'user' => 'required',
        ], [
            //custom validation
            'user.required' => 'User does not exist'
        ]); 
        }
        // echo '<pre>';
        // print_r($request->input());

        //return $admin->name;
        //return view('admin', ['name' => $admin->name]);
        Session::put('admin',$admin);
        return redirect('/dashboard');
    }

    public function dashboard() {
        $admin = Session::get('admin');
        if($admin){
            return view('admin', ['name' => $admin->name]);
        } else {
            return redirect('/admin-login'); 
        }
    }
}
