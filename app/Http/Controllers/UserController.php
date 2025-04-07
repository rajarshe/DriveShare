<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index(){
        return view("login");
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($validatedData)) {
            // Regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Redirect to the intended page
            return redirect()->intended(route('cars.index'))->with('success', 'You are logged in!');

        }

        // Return back with error if authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function create(){
        return view("register");
    }
    public function store(Request $request){
        // Validate the incoming request data
         $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:8',                // Minimum 8 characters
                'regex:/[a-z]/',        // At least one lowercase letter
                'regex:/[A-Z]/',        // At least one uppercase letter
                'regex:/[0-9]/',        // At least one digit
                'regex:/[@$!%*?&]/',    // At least one special character
                'confirmed',            // 'password_confirmation' must match
            ],
            'security_answer_1' => 'required|string|max:255',
            'security_answer_2' => 'required|string|max:255',
            'security_answer_3' => 'required|string|max:255',
        ]);

        // Hash the password before saving
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save the data into the User model
        User::create($validatedData);

        // Redirect to the login page with a success message
        return redirect()->route('user.login')->with('success', 'Account created successfully! Please log in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
    
}
