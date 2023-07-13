<?php

namespace App\Http\Controllers;

use App\Http\Requests\changePasswordRequest;
use App\Models\auther;
use App\Models\book;
use App\Models\category;
use App\Models\Image;
use App\Models\File;
use App\Models\Voice;
use App\Models\publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'users' => User::count(),
            'authors' => auther::count(),
            'publishers' => publisher::count(),
            'categories' => category::count(),
            'images' => Image::count(),
            'files' => File::count(),
            'books' => book::count(),
        ]);
    }


    public function change_password_view()
    {
        return view('reset_password');
    }

    public function change_password(changePasswordRequest $request)
    {
        if (Auth::check(["username" => auth()->guard('admin')->user()->username, "password" => $request->c_password])) {
            auth()->guard('admin')->user()->password = bcrypt($request->password);
            return redirect()->back()->with(['message' => "Password Changed Successfully!."]);
        } else {
            return "";
        }
    }
}