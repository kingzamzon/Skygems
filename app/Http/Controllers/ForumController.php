<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForumController extends Controller
{
    public function login_show()
    {
        return view('forum.views.login');
    }

    public function login(Request $request)
    {
        try {
            # credentials
            $credentials =  $request->only('phone', 'password');
            # attempt login
            if (Auth::attempt($credentials)) {
                # Authentication passed...
                $success = "Welcome";
                return redirect()->route('forum.index')->with(['data' => $success]);
            }
            else{
                return back()->withInput()->withErrors(['Password incorrect']);
            }
        } catch (\Exception $ex) {
            dd($ex);
        }
    }

    public function logout()
    {
        # logout
        Auth::logout();
        return redirect()->route('forum.index');
    }

    public function index()
    {
        return view('forum.views.index');
    }

    public function create()
    {
        return view('forum.views.create_topic');
    }

    public function show($slug)
    {
        return view('forum.views.single_topic');
    }

    public function categories()
    {
        return view('forum.views.categories');
    }

    public function categories_show($slug)
    {
        return view('forum.views.categories_single');
    }


}