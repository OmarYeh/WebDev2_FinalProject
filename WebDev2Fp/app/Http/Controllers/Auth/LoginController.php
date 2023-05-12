<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    
    
            // Log in the user
            Auth::login($newUser, true);
    
    
            // Redirect to home page
            return redirect('/');
        }
    
}
