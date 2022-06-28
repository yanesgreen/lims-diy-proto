<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index(User $user)
    {

        return view('profile.index', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        // check old password
        $pw = $request->password_lama;
        $hashed = $user->password;
        if (Hash::check($pw, $hashed) == true) {
            $rules = [
                'password' => 'required|min:8|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
            ];
        } else {
            $rules = [
                'password_lama' => 'required|in:' . $user->password,
                'password' => 'required|min:8|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
            ];
        }

        // validate $_PUT
        $this->validate($request, $rules);

        // update user input
        $user->password = Hash::make($request->input('password'));

        // update data
        $user->update();

        $response = ['message' => 'Password anda berhasil diubah.'];
        return $response;
    }

    public function updatePin(Request $request, User $user)
    {
        $rules = [
            'pin_lama' => 'required|in:' . $user->pin,
            'pin' => ['required', 'min:4', 'max:10', 'confirmed', Rule::unique('users')->ignore($user->id)],
            'pin_confirmation' => 'required|same:pin',
        ];

        // validate $_PUT
        $this->validate($request, $rules);

        // update user input
        $user->pin = $request->input('pin');

        // update data
        $user->update();

        $response = ['message' => 'PIN anda berhasil diubah.'];
        return $response;
    }

}
