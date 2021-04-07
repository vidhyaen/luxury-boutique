<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index()

    {
        return view('accounts.forget');
    }
    public function changepassword()

    {
        return view('accounts.changepassword');
    }
}
