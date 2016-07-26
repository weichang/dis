<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    //
    public function index(){

        $discussions = Discussion::all();
        return view('forum.index',compact('discussions'));
    }

    public function show($id){

        $discussion = Discussion::findOrFail($id);
        return view('forum.show',compact('discussion'));
    }
}

