<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\userroles;
use App\Models\role;
use App\Models\basket;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
    
    
        // You can now log in the user or register them if they don't exist
        // For example:
        $authUser = User::where('provider_id', $user->getId())
            ->where('provider', $provider)
            ->first();
    
    
        if ($authUser) {
            Auth::login($authUser);
        } else {
    
    
    
    
            session([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider' => $provider,
                'provider_id' => $user->getId(),
                'password' => bcrypt('password'),
            ]);
    
    
            return redirect()->route('profile.complete');
        }
    
    
        return redirect()->intended('/');
    }
    
    
    public function completeProfile(Request $request)
        {
            $user = session()->all();
    
    
            return view('auth.completeRegister')->with('user',$user);
        }
    
    
        public function storeProfile(Request $request)
        {
            // Get user details from session
            $user = session()->all();
            $request->validate([
             
                'birthday' => ['required', 'date', 'before_or_equal:' . now()->subYears(10)->format('Y-m-d')],
                'gender' => ['required'],
                'phonenumber' =>['required','numeric'],
            ]);
            // Create new user record
            $birthday = new DateTime($request->birthday);
            $today = new DateTime();
            $age = $today->diff($birthday)->y;
    
    
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'provider' => $user['provider'],
                'provider_id' => $user['provider_id'],
                'password' => Hash::make($user['password']),
                'Age' => $age,
                'Gender' => $request->gender,
                'phone_number' => $request->phonenumber,
            ]);
            event(new Registered($newUser));

            $userroles = new userroles();
            $userroles->user_id = $newUser->id;
            $role = role::where('name','Client')->first();
            $userroles->role_id = $role->id;
            $userroles->save();
            $basket = new basket();
            $basket->user_id = $newUser->id;
            $basket->save();

            Auth::login($newUser, true);

            return redirect(RouteServiceProvider::EmV);
        }
    
}
