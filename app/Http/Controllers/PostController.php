<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['only'=>['create','store','update','edit']]);
    }

    public function index(){

        $discussions = Discussion::all();
        return view('forum.index',compact('discussions'));
    }

    public function show($id){

        $discussion = Discussion::findOrFail($id);
        return view('forum.show',compact('discussion'));
    }
    public  function create()
    {
        return view('forum.create');
    }
    public function store(Requests\StorePostRequest $request)
    {
        $data = [
            'user_id' => \Auth::user()->id,
            'last_user_id'=>\Auth::user()->id
        ];
        $discussion = Discussion::create(array_merge($request->all(),$data));
        
        return redirect()->action('PostController@show',['id'=>$discussion->id]);
    }

}

