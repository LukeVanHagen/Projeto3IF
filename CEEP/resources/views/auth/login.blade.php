<x-guest-layout>
    <div class="register-popUp">
            
    <div class="card">
      <div class="login">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            <form method="POST" action="{{ route('login') }}" class="register"> 
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" class="px-2 label text-white"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="px-2 label text-white" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class=" px-2">
                        <input id="remember_me" type="checkbox" class=" rounded border-violet-300 text-indigo-200 shadow-sm focus:border-indigo-200" name="remember">
                        <span class="ml-2 text-sm text-white">{{ __('Lembre me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-2" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
            </form>
    </div>
</div>
        
       
</x-guest-layout>
