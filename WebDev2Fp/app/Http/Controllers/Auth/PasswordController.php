<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/','max:16', 'confirmed'],
        ]);
        $user = Auth::user();
        if($validated['password'] == $validated['current_password']){
            return back()->withErrors( 'You cant use the same password as your old one!');
        }else{
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
       
    }
        return back()->with('status', 'password-updated');
    }
}
