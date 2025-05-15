<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {}
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
    }
}
