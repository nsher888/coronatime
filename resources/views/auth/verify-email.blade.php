<x-layout class="flex flex-col h-screen">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="flex flex-col flex-1 my-10 items-center justify-center md:my-0 md:w-[392px] md:mx-auto">
        <img src="{{ asset('images/check-circle.gif') }}" class="mb-4 w-14 h-14">
        <p class="text-lg text-center text-slate-950">{{ __('auth.verification_sent') }}</p>
    </div>
</x-layout>