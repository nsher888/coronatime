<x-layout>
    <x-split-layout>
        <x-form-header title="{{ __('auth.welcome_corona') }}" subtitle="{{ __('auth.welcome_corona_message') }}" />
        <form class="max-w-sm" method="POST" action="{{ route('register.store', app()->getLocale()) }}">
            @csrf
            <x-form-input type="text" name="username" label="{{ __('auth.username') }}"
                placeholder="{{ __('auth.enter_username') }}" />
            <x-form-input type="email" name="email" label="{{ __('auth.mail') }}"
                placeholder="{{ __('auth.enter_mail') }}" />
            <x-form-input type="password" name="password" label="{{ __('auth.password') }}"
                placeholder="{{ __('auth.enter_password') }}" />
            <x-form-input type="password" name="password_confirmation" label="{{ __('auth.repeat_password') }}"
                placeholder="{{ __('auth.repeat_password') }}" />
            <x-form-button label="{{ __('auth.register') }}" />
            <div class="flex self-center justify-center gap-2">
                <p class="text-zinc-500">{{ __('auth.already_have_account') }}</p>
                <a class="font-bold text-slate-950" href="{{ route('login.create', app()->getLocale()) }}">{{
                    __('auth.login') }}</a>
            </div>
        </form>
    </x-split-layout>
</x-layout>