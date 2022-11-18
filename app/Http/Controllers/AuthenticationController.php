<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthenticationController extends Controller
{
    public function register(Request $request){
        $user = new User;
        $data = $request->input();
        
        $credentials = $request->only('email', 'password');

        
        if($data['password'] != $data['confirmaSenha']){
            return view('login-register', ['error' => 'Senha não confere!']);
        }else{
            $data['password'] = Hash::make($data['password']);
            if($user->create($data)){
                if(Auth::attempt($credentials)){
                    $request->session()->regenerate();
                    Auth::user()->createToken('access');
                    return redirect()->route('home');
                }else{
                    return view('login-register', ['error' => 'Erro ao criar usuário!']);
                }
            }else{
                return view('login-register', ['error' => 'Senha não confere!']);
            }
        }
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Auth::user()->createToken('access');
            return redirect()->route('home');
        }else{
            return view('login-register', ['error' => 'Email ou senha incorretos!']);
        }

    }

    public function logout(Request $request){
        Auth::user()->tokens()->delete();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('login-register');
    }

    public function forgot(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'confirmaSenha', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
