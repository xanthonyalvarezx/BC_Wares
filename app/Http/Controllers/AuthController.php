<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (auth()->attempt(['email' => $loginData['email'], 'password' => $loginData['password']])) {
            $request->session()->regenerate();

            // event(new authLog(['name' => auth()->user()->name, 'action' => 'login']));
            if (auth()->user()->vendor == 1) {
                return redirect('/vendor/dashboard/products')->with('success', auth()->user()->business . " you've successfully logged in");
            } else {
                return redirect('/shop')->with('success', auth()->user()->firstname . " you've successfully logged in");
            }
        } else {
            // event(new authLog(['name' => '', 'email' => $loginData['email'], 'action' => 'failed login']));
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => ['required', 'min:4', 'max:20'],
            'lastName' => ['required', 'min:4', 'max:20'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
            'address' => ['required'],
            'addresslinetwo' => ['nullable'],
            'addresslinethree' => ['nullable'],
            'state' => ['required'],
            'postcode' => ['required'],
            'business' => ['required'],
            'producttype' => ['required'],
            'policy' => ['required'],
            'terms' => ['required'],
        ]);

        $validatedData['addresslinetwo'] = $validatedData['addresslinetwo'] ?? '';
        $validatedData['addresslinethree'] = $validatedData['addresslinethree'] ?? '';
        $validatedData['vendor'] = true;


        $validatedData['password'] = Hash::make($validatedData['password']);
        try {
            $newUser = User::create($validatedData);

            return redirect('/login')->with('success', 'New admin registered successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect('/register')->with('failure', 'Something went wrong please try again!');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
