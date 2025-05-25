<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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

        // First try vendor login
        if (Auth::attempt(['email' => $loginData['email'], 'password' => $loginData['password']])) {
            $request->session()->regenerate();
            if (Auth::user()->vendor == 1) {
                return redirect('/vendor/dashboard/products')->with('success', Auth::user()->business . " you've successfully logged in");
            }
        }

        // If vendor login fails, try customer login
        if (Auth::guard('customer')->attempt(['email' => $loginData['email'], 'password' => $loginData['password']])) {
            $request->session()->regenerate();
            return redirect('/shop')->with('success', "Welcome back!");
        }

        return redirect('/login')->with('error', 'Invalid credentials');
    }
    // register vendor
    public function register(Request $request)
    {
        // validate data
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
        // set addresslinetwo to empty if null
        $validatedData['addresslinetwo'] = $validatedData['addresslinetwo'] ?? '';
        $validatedData['addresslinethree'] = $validatedData['addresslinethree'] ?? '';
        $validatedData['vendor'] = true;

        // hash password
        $validatedData['password'] = Hash::make($validatedData['password']);
        try {
            $newUser = User::create($validatedData);
            // login user
            return redirect('/login')->with('success', 'New admin registered successfully!');
            // catch error
        } catch (\Exception $e) {
            dd($e->getMessage());
            // return error message
            return redirect('/register')->with('failure', 'Something went wrong please try again!');
        }
    }

    // register customer
    public function registerCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => ['required', 'min:2', 'max:50'],
            'lastName' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email', Rule::unique('customers', 'email')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        try {
            $validatedData['password'] = Hash::make($validatedData['password']);
            $newCustomer = Customer::create([
                'firstName' => $validatedData['firstName'],
                'lastName' => $validatedData['lastName'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password']
            ]);
            return redirect('/login')->with('success', 'New customer registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }
    // logout user
    public function logout()
    {
        // Logout from both guards
        Auth::guard('web')->logout();
        Auth::guard('customer')->logout();
        // end session
        session()->flush();
        return redirect('/login');
    }
}
