<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'matricula' => ['nullable', 'string'],
                'rfid' => ['nullable', 'string'],
                'role' => ['nullable', 'string'],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'matricula' => $request->matricula,
                'rfid' => $request->rfid,
                'role' => $request->role,
            ]);

            event(new Registered($user));

            Auth::login($user);

            // Adicione esta linha para verificar se o usuário foi criado com sucesso
            \Log::info('Usuário criado com sucesso:', ['user_id' => $user->id, 'email' => $user->email]);

            return redirect(RouteServiceProvider::HOME);
        } catch (\Exception $e) {
            // Adicione esta linha para verificar se ocorreu algum erro
            \Log::error('Erro ao criar usuário:', ['error' => $e->getMessage()]);

            // Adicione aqui a lógica para lidar com o erro, se necessário
            return back()->withInput()->withErrors(['error' => 'Erro ao cadastrar usuário']);
        }
    }
}