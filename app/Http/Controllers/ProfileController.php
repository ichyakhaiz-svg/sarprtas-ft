<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
{
    $user = auth()->user();

    $user->username =
        $request->username;

    $user->email =
        $request->email;

    if($request->hasFile('foto'))
    {
        $file =
            $request->file('foto');

        $filename =
            time() .
            '.' .
            $file->getClientOriginalExtension();

        $file->move(
            public_path('uploads/profile'),
            $filename
        );

        $user->foto =
            'uploads/profile/' . $filename;
    }

    $user->save();

    return back()->with(
        'success',
        'Profile berhasil diupdate'
    );
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updatePassword(Request $request)
{
    $request->validate([

        'current_password' =>
            'required',

        'password' =>
            'required|min:6|confirmed'

    ]);

    $user = auth()->user();

    if(
        !Hash::check(
            $request->current_password,
            $user->password
        )
    )
    {
        return back()
            ->with(
                'error',
                'Password lama tidak sesuai'
            );
    }

    $user->password =
        Hash::make(
            $request->password
        );

    $user->save();

    return back()
        ->with(
            'success',
            'Password berhasil diubah'
        );
}
}
