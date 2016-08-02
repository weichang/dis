<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Mail;
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
        $data = [
            'confirm_code'=>str_random(48),
            'avatar'=>'/images/default-avatar-catty.jpg'
        ];
        $user = User::create(array_merge($request->all(),$data));
        $subject ="論壇EMAIL確認信!!";
        $view = 'email.register';
        $this->sendTo($user,$subject,$view,$data);
        return redirect('/');

    }
    public function confirmEmail($confirm_code)
    {

        $user = User::where('confirm_code',$confirm_code)->first();
        if(is_null($user)){
            return redirect('/');
        }
        $user->is_confirmed=1;
        $user->confirm_code = str_random(45);
        $user->save();
        return redirect('user/login');
    }

    private function sendTo($user,$subject,$view,$data)
    {
       Mail::queue($view,$data,function ($message) use ($user,$subject){

           $message->to($user->email)->subject($subject);
       });
    }
}
