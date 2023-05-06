<x-layout class="flex flex-col h-screen">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="flex flex-col flex-1 my-10 md:items-center md:justify-center md:my-0 md:w-[392px] md:mx-auto">
        <h1 class="text-2xl font-extrabold text-center mb-14">{{ __('auth.reset_password') }}</h1>

        <form method="POST" action="{{ route('password.update', app()->getLocale()) }}"
            class="flex flex-col justify-between h-full px-4 md:h-auto md:w-full">
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