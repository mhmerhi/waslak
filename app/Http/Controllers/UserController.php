<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit(int $id)
    {
        $loggedUSer = Auth::user();

        if ($loggedUSer->id == $id) {
            $user = User::query()->find($id);

            return view('users.edit', [
                'user' => $user,
            ]);
        }

        return redirect('/');
    }


    public function update(Request $request, int $id)
    {
        if (Auth::user()->id != $id) {
            return redirect('/');
        }

        $validators = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => [
                'nullable',
                'string',
                'min:8',],
            'phone' => ['required', 'string', 'max:255'],
        ];

        try {
            $request->validate($validators);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()],422);
        }

        $user = User::query()->find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        if ($request->has('password') && $request->input('password') != '') {
            $user->password = Hash::make($request->input('password'));
        }

        $user->phone = $request->input('phone');
        $user->save();

        return redirect('/');
    }
}
