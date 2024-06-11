<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorsProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InvestorsProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('investors.profile', [
            'user' => Auth::guard('investor')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(InvestorsProfileUpdateRequest $request): RedirectResponse
    {
        Auth::guard('investor')->user()->fill($request->validated());
        if($request->hasFile('picture'))
        {
            $picture = $request->file('picture');
            $filename = time().$this->generateRandomUniqueName(12). '.' .$picture->getClientOriginalExtension();
            $picture->move(public_path('storage/pictures'), $filename);
            $picture = 'storage/pictures/' . $filename;
            Auth::guard('investor')->user()->picture = $picture;
        }
        else{
            if($request->input('pictureValue') == 'null')
            {
                Auth::guard('investor')->user()->picture = null;
            }
        }

        Auth::guard('investor')->user()->fill($request->validated());

        if (Auth::guard('investor')->user()->isDirty('email')) {
            Auth::guard('investor')->user()->email_verified_at = null;
        }

        Auth::guard('investor')->user()->save();

        return Redirect::route('investors.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = Auth::guard('investor')->user();

        Auth::guard('investor')->logout();

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
