<x-layout class="flex flex-col h-screen">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="flex flex-col flex-1 my-10 md:items-center md:justify-center md:my-0 md:w-[392px] md:mx-auto">
        <h1 class="text-2xl font-extrabold text-center mb-14">{{ __('auth.reset_password') }}</h1>

        <form class="flex flex-col justify-between h-full px-4 md:h-auto md:w-full" method="POST"
            action="{{ route('password.email', ['language' => app()->getLocale()]) }}">
            @csrf
            <x-form-input type="text" name="email" label="{{ __('auth.mail') }}"
                placeholder="{{ __('auth.enter_mail') }}" />
            <x-form-button label="{{ __('auth.reset_password') }}" />
        </form>
    </div>
</x-layout>