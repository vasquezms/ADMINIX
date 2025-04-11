<x-guest-layout>
    <!-- Mensaje de estado de sesión -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-center text-2xl font-bold mb-6">Iniciar Sesión</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Correo Electrónico -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="flex items-center">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>

        <!-- Botones de acción -->
        <div class="flex flex-col items-center space-y-4">
            <x-primary-button class="w-full">
                {{ __('Iniciar Sesión') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            @if (Route::has('register'))
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('¿No tienes una cuenta? Regístrate aquí') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>