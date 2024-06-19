<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackFromGoogle()
    {
         return redirect()->route('getProfile');
        try {
            $user = Socialite::driver('google')->user();
            // Check Users Email If Already There
            $is_user =  DB::table('users')
                ->where('email', '=', $user->getEmail())
                ->first();
            if(!$is_user){
                $saveUser = DB::table('users')->insert([
                    'gg_id' => $user->getId(),
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
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
                $iscreate = true;
            }else{
                // $saveUser = User::where('email',  $user->getEmail())->update([
                //     'gg_id' => $user->getId(),
                // ]);
                $saveUser = DB::table('users')
              ->where('email', $user->getEmail())
              ->update(['gg_id' => $user->getId()]);
              
                $saveUser = DB::table('users')
                ->where('email', '=', $user->getEmail())
                ->first();
                $iscreate = false;
            }

            Auth::loginUsingId($saveUser->id);
            return redirect()->route('home');
            
        } catch (\Throwable $th) {
            throw $th;
            
        }
    }
}
