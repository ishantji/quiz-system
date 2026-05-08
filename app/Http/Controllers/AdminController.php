<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
        if ($admin) {
            return view('categories', ['name' => $admin->name]);
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
}
