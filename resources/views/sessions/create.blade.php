<x-layout>
    <x-split-layout>
        <x-form-header title="{{ __('auth.welcome_back') }}" subtitle="{{ __('auth.welcome_back_message') }}" />
        <form class="max-w-sm" method="POST" action="{{ route('login.store', app()->getLocale()) }}">
            @csrf
            <x-form-input type="text" label="{{ __('auth.username') }}" name="username"
                placeholder="{{ __('auth.enter_username_email') }}" />
            <x-form-input type="password" label="{{ __('auth.password') }}" name="password"
                placeholder="{{ __('auth.enter_password') }}" />
            <div class="flex items-center justify-between mb-6">
                <x-form-checkbox name="remember" label="{{ __('auth.remember_device') }}" />
                <a href="{{ route('password.request', app()->getLocale()) }}"
                    class="text-sm font-semibold text-blue-700">
                    {{ __('auth.forgot_password') }}
                </a>
            </div>

            <x-form-button label="{{ __('auth.login') }}" />
            <div class="flex justify-between gap-2 md:justify-center">
                <p class="text-zinc-500">{{ __('auth.dont_have_account') }}</p>
                <a class="font-bold text-slate-950" href="{{ route('register.create', app()->getLocale()) }}">{{
                    __('auth.sign_up') }}</a>
            </div>
        </form>
    </x-split-layout>
</x-layout>
