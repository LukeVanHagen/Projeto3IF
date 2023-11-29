<x-guest-layout>
    <div class="register-popUp">
            <div class="card">
    <div class="register">
        <h2>Cadastre-se</h2>
        <p>Por favor, crie uma conta para começar</p>
        <form method="POST" action="{{ route('register') }}">
            <form method="POST" action="{{ route('register') }}" class="register">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nome')" class="px-2 label text-white"/>
                    <x-text-input id="name" class="block mt-1  w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="px-2 label text-white"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-input-label for="role" value="{{ __('Role') }}" class="px-2 label text-white" />
                    <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Senha')" class="px-2 label text-white"/>
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirme a senha')"  class="px-2 label text-white"/>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 px-2">
                    <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('login') }}">
                        {{ __('Já é cadastrado?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Cadastrar') }}
                    </x-primary-button>
                </div>
            </form>
        </form>
    </div>
</div>

        
</x-guest-layout>
