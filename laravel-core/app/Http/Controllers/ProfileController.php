<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.profile', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if($request->hasFile('picture'))
        {
            $picture = $request->file('picture');
            $filename = time().$this->generateRandomUniqueName(12). '.' .$picture->getClientOriginalExtension();
            $picture->move(public_path('storage/pictures'), $filename);
            $picture = 'storage/pictures/' . $filename;
            $request->user()->picture = $picture;
        }
        else{
            if($request->input('pictureValue') == 'null')
            {
                $request->user()->picture = null;
            }
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    private function generateRandomUniqueName($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomName = '';
        for ($i = 0; $i < $length; $i++) {
            $randomName .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomName;
    }
}
