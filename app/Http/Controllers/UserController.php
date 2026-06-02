<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::paginate(10);

        return view(
            'user.index',
            compact('user')
        );
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        User::create([

            'username' =>
                $request->username,

            'role' =>
                $request->role,

            'password' =>
                Hash::make(
                    $request->password
                )

        ]);

        return redirect('/user')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'user.edit',
            compact('user')
        );
    }

    public function update(
        Request $request,
        $id
    )
    {
        $user =
            User::findOrFail($id);

        $user->update([

            'username' =>
                $request->username,

            'role' =>
                $request->role

        ]);

        return redirect('/user');
    }

    public function destroy($id)
    {
        User::findOrFail($id)
            ->delete();

        return redirect('/user');
    }

    public function resetPassword($id)
    {
        $user =
            User::findOrFail($id);

        $user->password =
            Hash::make('sarpras123');

        $user->save();

        return redirect('/user')
            ->with(
                'success',
                'Password berhasil direset menjadi: sarpras123'
            );
    }
}