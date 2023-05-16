<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\userroles;
use App\Models\role;
use App\Models\basket;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use DateTime;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'birthday' => ['required', 'date', 'before_or_equal:' . now()->subYears(10)->format('Y-m-d')],
            'gender' => ['required'],
            'password' => ['required', 'string', 'min:8','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/','max:16', 'confirmed'],
            'phonenumber' =>['required','numeric'],
        ]);
        $birthday = new DateTime($request->birthday);
        $today = new DateTime();
        $age = $today->diff($birthday)->y;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Gender' =>$request->gender,
            'Age' =>$age,
            'phone_number'=>$request->phonenumber
        ]);

        event(new Registered($user));

        $userroles = new userroles();
        $userroles->user_id = $user->id;
        $role = role::where('name','Client')->first();
        $userroles->role_id = $role->id;
        $userroles->save();
        $basket = new basket();
        $basket->user_id = $user->id;
        $basket->save();
        Auth::login($user);

        return redirect(RouteServiceProvider::EmV);
    }
}
