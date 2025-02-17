<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('user.profile')
            ->with('id', '05')
            ->with('name', 'Kayla Rachmaudina')
        ;
    }
}
