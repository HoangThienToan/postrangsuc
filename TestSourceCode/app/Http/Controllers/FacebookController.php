<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            // Check Users Email If Already There
            // $is_user = User::where('email', $user->getEmail())->first();
            $users = DB::table('users')
                ->where('email', '=', $user->getEmail())
                ->first();
            if (!$users) {

                $saveUser = User::updateOrCreate([
                    'fb_id' => $user->getId(),
                ], [
                    'first_name' => $user->getName(),
                    'username' => $user->getName(),
                    'user_type' => 'user',
                    'language' => 'en',
                    'allow_login' => '1',
                    'status' => 'active',
                    'is_cmmsn_agnt' => '0',
                    'cmmsn_percent' => '0',
                    'selected_contacts' => '0',
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName() . '@' . $user->getId()),
                ]);
            } else {
                // $saveUser = User::where('email', $user->getEmail())->update([
                //     'fb_id' => $user->getId(),
                // ]);
                $saveUser = DB::table('users')
              ->where('email', $user->getEmail())
              ->update(['fb_id' => $user->getId()]);
              
                $saveUser =  DB::table('users')
                ->where('email', '=', $user->getEmail())
                ->first();
            }
            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
        } catch (\Throwable$th) {
            throw $th;
        }
    }
}
