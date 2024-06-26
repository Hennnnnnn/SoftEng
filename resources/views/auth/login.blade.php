<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex" style="gap: 1rem; margin: 0; padding: 0">
        <div style="width:100%">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <h1 style="text-align: end; color: #579966; font-weight: bold; font-size: 20px">Recraftify</h1>
                </div>
                <div class="pb-4">
                    <h2 style="font-weight: bold; font-size:20px">Hello!</h2>
                    <h2 style="font-weight: bold; font-size: 17px">Welcome back</h2>
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email here"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="row mt-2">
                    <div class="col-12 text-center">
                        <span class="text-sm hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Don't Have An Account?
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                Register
                            </a>
                        </span>
                    </div>
                </div>

                <div class="flex items-center justify-content-between mt-2">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div>
            <img src="{{ asset('/storage/bg-login.png') }}" alt="">
        </div>
    </div>

</x-guest-layout>
