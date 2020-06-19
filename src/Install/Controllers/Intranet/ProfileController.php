<?php

namespace App\Http\Controllers\Intranet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth('intranet')->user();
        if ($user) {
            if (empty($user)) {
                session()->flash('danger', 'Usuario no encontrado.');
                return redirect()->back();
            }
            return view('intranet.modules.profile.edit', ['user' => $user]);
        } else {
            return redirect()->route('intranet.auth.login');
        }
    }

    public function update(Request $request)
    {
        $user = auth('intranet')->user();

        if (empty($user)) {
            session()->flash('danger', 'Usuario no encontrado.');
            return redirect()->back();
        }

        if (auth('intranet')->user()) {
            $this->validate($request, [
                'email' => 'required|unique:users,email,' . $user->id . ',id|max:255',
                'first_name' => 'required|max:100',
                'last_name' => 'required|max:100',
            ]);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->second_last_name = $request->second_last_name;
        $user->email = $request->email;

        if ($request->password and $request->password != '') {

            $this->validate($request, [
                'password' => 'max:255|min:4'
            ]);

            $user->password = bcrypt($request->password);
        }

        if (auth('intranet')->user()) {
            if ($request->imagen) {
                $ext = $request->file("imagen")->getClientOriginalExtension();
                $user->photo = $request->file("imagen")
                    ->storeAs('public/perfil', $user->id . '.' . $ext);

            }
        }

        $user->save();

        session()->flash('success', 'Se han guardado los cambios en su perfil.');
        return redirect(route('intranet.profile.edit'));
    }
}
