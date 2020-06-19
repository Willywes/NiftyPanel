<?php

namespace App\Http\Controllers\Intranet;

use App\Models\ClientUser;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //return $this->middleware('guest', ['only' => ['showLogin','showSendPassword','showRecoveryPassword']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        $guard = $user ? 'intranet' : 'customer';

        if (auth()->guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->guard($guard)->user()->active == 1) {
                return redirect()->intended(route('intranet.dashboard'));
            } else {
                session()->flush();
                return back()->withErrors(['error' => 'Su usuario se encuentra inactivo, para más información contacte con un administrador.'])->withInput();
            }
        }
        return back()->withErrors(['error' => 'La combinación de email y contraseña es incorrecta.'])->withInput();
    }

    public function show()
    {
        return view('intranet.auth.show');
    }


    public function sendPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {

            $user->recovery_pin = rand(100000, 999999);
            $user->save();

            Mail::send('intranet.emails.send-password', ['user' => $user], function ($message) use ($user) {
                $message->to($user->email, $user->full_name)
                    ->subject('Código para restablecer contraseña.');
            });

        }

        session()->flash('success', 'Le hemos enviado un correo electrónico con un código para restablecer su contraseña.');
        return redirect()->route('intranet.auth.show-recovery-password');

    }

    public function showSendPassword()
    {
        return view('intranet.auth.send_password');
    }

    public function recoveryPassword(Request $request)
    {
        $this->validate($request, [
            'recovery_pin' => 'required|numeric|max:100000',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if ($user->recovery_pin == $request->recovery_pin) {
                $user->password = bcrypt($request->password);
                $user->recovery_pin = null;
                $user->save();

                session()->flash('success', 'Su contraseña ha sido modificada correctamente.');
                return redirect()->route('intranet.auth.show');

            }
            return back()->withErrors(['remember_token' => 'El código de recuperación no coincide con el enviado a su correo.'])->withInput();
        }

        session()->flash('success', 'Su contraseña ha sido modificada correctamente.');
        return redirect()->route('intranet.auth.show');
    }


    public function showRecoveryPassword()
    {
        return view('intranet.auth.recovery_password');
    }

    public function logout()
    {
        auth()->guard('intranet')->logout();
        auth()->guard('customer')->logout();
        session()->flush();
        return redirect()->intended(route('intranet.auth.show'));
    }

}
