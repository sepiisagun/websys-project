<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        // 'before:-18 years' validation fo date
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date_format:d/m/Y'],
            'phone_number' => ['required', 'numeric', 'digits:11'],
            'address' => ['required', 'string', 'max:255'],
            // 'role' => ['required', 'in:RENTEE,RENTER,ADMIN'],
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_date' => Carbon::createFromFormat('d/m/Y', $request->birth_date)->format('Y-m-d'),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => "RENTEE",
            // 'image_path' => $this->storeImage($request),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    // Use function below to store images
    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . Str::replace('.', '_', $request->username) . '.' . $request->file_input->extension();
        $request->file_input->move(public_path('img'), $newImageName);

        return $newImageName;
    }
}
