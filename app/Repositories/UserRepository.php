<?php
namespace App\Repositories;

use App\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function addUser($data)
    {
        return $user = $this->user->create($data);
    }
    
    public function confirm_email($confirm_code)
    {
        $user = $this->user->where('confirm_code', $confirm_code)->first();

        if(is_null($user)){
            return false;
        }else{
            
            $user->is_confirmed = 1;
            $user->confirm_code = str_random(45);
            $user->save();
            return true;
        }

    }
}