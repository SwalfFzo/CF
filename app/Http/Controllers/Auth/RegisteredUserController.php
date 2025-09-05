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
use Spatie\Permission\Models\Role;

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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'regex:/^(05\d{8}|\+9665\d{8})$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'terms' => ['required', 'accepted'],
        ], [
            'phone.regex' => 'يجب أن يكون رقم الهاتف بصيغة صحيحة (مثال: 05xxxxxxxx)',
            'terms.required' => 'يجب الموافقة على الشروط والأحكام',
            'terms.accepted' => 'يجب الموافقة على الشروط والأحكام',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Automatically assign trainee role
        $traineeRole = Role::where('name', 'trainee')->first();
        if ($traineeRole) {
            $user->assignRole($traineeRole);
        }

        event(new Registered($user));

        Auth::login($user);

        // Redirect to trainee dashboard
        return redirect(route('trainee.dashboard', absolute: false));
    }
}
