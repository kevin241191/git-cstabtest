<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\TokenFormRequest;
use App\Models\User;
use App\Notifications\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Testing\Fakes\NotificationFake;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }

    public function post_reset($token, TokenFormRequest $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            if ($request->password == $request->confirm_password) {
                $user->password = Hash::make($request->password);
                if (empty($user->email_verified_at)) {
                    $user->email_verified_at = date('Y-m-d H:i:s');
                }
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect('login')->with('success_message', 'Modification réussi avec succès');
            } else {
                return redirect()->back()->with('success_message', "Les mots de passent ne correspondent pas");
            }
        } else {
            abort(404);
        }
    }

    public function forgot_password(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {
            $user->remember_token = Str::random(40);
            $user->save();
            NotificationFake::route('mail', $user->email)->notify(new
                ForgotPasswordMail($user->nom, $user->prenom, $user->email, $user->remember_token));

            return redirect()->back()->with('success_message', 'S\'il vous plait vérifiez votre mail et modifier votre mot de passe');
        } else {
            return redirect()->back()->with('error_msg', 'Votre email n\'est pas dans le système.');
        }
    }

    public function handleLogin(AuthRequest $request)
    {
        $remember  = request()->has('remember');

        $credentials = $request->only(['email', 'password', $remember]);


        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('error_msg', 'Paramètre de connexion non reconnu');
        }
    }
}
