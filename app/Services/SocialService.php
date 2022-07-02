<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            if($socialUser->getName()) {
                $user->name = $socialUser->getName();
            } else {
                $user->name = $socialUser->getNickname();
            }
            $user->avatar = $socialUser->getAvatar();
            if($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account');
            }
        } else {
            // register

            return route('register');
        }
        throw new ModelNotFoundException("Model Not Found");
    }
}
