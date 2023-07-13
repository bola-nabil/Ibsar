<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => "required",
            'password' => "required",
        ]);

        if (auth()->guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return(redirect('/books'));
        } else {
            return redirect()->back()->withErrors(['username' => 'Invaild you username or password']);
        }
    }
    
    public function logout(Request $request)
    {

        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect('/');
    }
    
}
