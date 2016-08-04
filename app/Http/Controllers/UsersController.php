<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Mail;
use Image;
class UsersController extends Controller
{
    //
    public function register()
    {

        return view('users.register');

    }

    public function store(Requests\UserRegisterRequest $request)
    {
        //dd($request->all());
        $data = [
            'confirm_code' => str_random(48),
            'avatar'       => '/images/default-avatar-catty.jpg'
        ];
        $user = User::create(array_merge($request->all(), $data));
        $subject = "論壇EMAIL確認信!!";
        $view = 'email.register';
        $this->sendTo($user, $subject, $view, $data);
        return redirect('/');

    }

    public function confirmEmail($confirm_code)
    {

        $user = User::where('confirm_code', $confirm_code)->first();
        if (is_null($user)) {
            return redirect('/');
        }
        $user->is_confirmed = 1;
        $user->confirm_code = str_random(45);
        $user->save();
        return redirect('users/login');
    }

    private function sendTo($user, $subject, $view, $data)
    {
        Mail::queue($view, $data, function ($message) use ($user, $subject) {

            $message->to($user->email)->subject($subject);
        });
    }

    public function login()
    {

        return view('users.login');

    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    public function avatar()
    {
        return view('users.avatar');

    }
    public function changeAvatar(Request $request)
    {
        //取得圖片資訊
        $file = $request->file('avatar');
        //驗證
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return \Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }

        //上傳更新
        $uploadPath = 'uploads/';
        $filename= \Auth::user()->id.'_'.time().$file->getClientOriginalName();
        $file->move($uploadPath,$filename);
        Image::make($uploadPath.$filename)->fit(200)->save();
        $user = User::find(\Auth::user()->id);
        $user->avatar = '/'.$uploadPath.$filename;
        $user->save();


        return \Response::json([
            'success' => true,
            'avatar' => asset($uploadPath.$filename)
        ]);
        //return redirect('/users/avatar');
    }

    public function signin(Requests\UserLoginRequest $request)
    {

      if(\Auth::attempt([

          'email'=> $request->get('email'),
          'password'=> $request->get('password'),
          'is_confirmed'=> 1

      ])){
            return redirect('/');
      }
        \Session::flash('user_login_failed','密碼不正確或信箱沒驗證!');
        return redirect('/users/login')->withInput();
    }
}
