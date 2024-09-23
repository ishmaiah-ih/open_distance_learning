<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'reg' => ['nullable', 'string', 'max:255'],  // made nullable if it's optional
            'phone' => ['required', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:255'],
            'program' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],  // added required if necessary
            'picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
            'description' => ['nullable', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Handle the picture upload
        $picturePath = null;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('profile_pictures', 'public');  // stores in storage/app/public/profile_pictures
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'reg' => $request->reg,
            'program' => $request->program,
            'picture' => $picturePath,  // store the file path
            'year' => $request->year,
            'phone' => $request->phone,
            'role' => $request->role,  // added role field
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.dashboard');  // Correct redirection
    }

}
