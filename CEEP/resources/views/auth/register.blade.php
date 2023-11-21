<x-guest-layout>
    <div class="register-popUp">
            <div class="card">
    <div class="register">
        <h2>Cadastre-se</h2>
        <p>Please create an account to get started</p>
        <form method="POST" action="{{ route('register') }}">
            <form method="POST" action="{{ route('register') }}" class="register">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" class="px-2"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="px-2"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="matricula" value="{{ __('Matrícula') }}" class="px-2"/>
                    <x-text-input id="matricula" class="block mt-1 w-full" type="text" name="matricula" :value="old('matricula')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-input-label for="rfid" value="{{ __('RFID') }}" class="px-2"/>
                    <x-text-input id="rfid" class="block mt-1 w-full" type="text" name="rfid" :value="old('rfid')" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="role" value="{{ __('Role') }}" class="px-2" />
                    <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="px-2"/>
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')"  class="px-2"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 px-2">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </form>
    </div>
</div>

        
</x-guest-layout>
