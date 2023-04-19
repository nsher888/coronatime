<x-layout class="relative">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="absolute flex flex-col items-center transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <h1 class="text-2xl font-extrabold mb-14">{{ __('auth.reset_password') }}</h1>

        <form method="POST" action="{{ route('password.update', app()->getLocale()) }}" class="w-[392px]">
            @csrf

            <input type="hidden" name="token" value="{{  $token }}">
            <input type="hidden" name="email" value="{{ request()->get('email')}}">
            <x-form-input type="password" name="password" label="{{ __('auth.password') }}"
                placeholder="{{ __('auth.enter_new_password') }}" />
            <x-form-input type="password" name="password_confirmation" label="{{ __('auth.repeat_password') }}"
                placeholder="{{ __('auth.enter_new_password') }}" />
            <x-form-button label="Reset Password" />
        </form>
    </div>
</x-layout>