<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class UsersController extends Controller
{
    //
    public function  register()
    {

        return view('users.register');

    }
    public  function  store(Requests\UserRegisterRequest $request)
    {
        //dd($request->all());
        User::create(array_merge($request->all(),['avatar'=>'/images/default-avatar-catty.jpg']));
        return redirect('/');


    }
}
