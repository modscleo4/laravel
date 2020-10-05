<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Http\Requests\ChangeUserPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editPassword()
    {
        $user = Auth::user();

        return view('auth.passwords.change')->with(['user' => $user]);
    }

    public function updatePassword(ChangeUserPassword $request)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();

            $user->password = Hash::make($request->validated()['password']);
            $user->password_change_at = Carbon::now();

            $user->save();

            DB::commit();
            return redirect()->route('home');
        } catch (\Exception $e) {
            DB::rollBack();
            alert()
                ->error('Alterar senha', 'Não foi possível alterar a senha!')
                ->autoClose(1500)
                ->position('top-end');
        }

        return redirect()->route('home');
    }
}
