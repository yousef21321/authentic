<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //To make the website secure
    public function __construct()
    {
        $this->middleware('auth');
    }
    // View profile page
    public function index(): \Illuminate\View\View
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    // Update profile page
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'health_condition' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
        ]);

        $loggedInUser = auth()->user();
        $profile = $loggedInUser->profile;

        // Update profile fields based on the validated request data
        $profile->fill($validatedData);
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}

