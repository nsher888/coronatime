<x-layout class="relative">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="absolute flex flex-col items-center transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <h1 class="text-2xl font-extrabold mb-14">Reset Password</h1>

        <form method="POST" action="{{ route('password.update') }}" class="w-[392px]">
            @csrf

            <input type="hidden" name="token" value="{{  $token }}">
            <input type="hidden" name="email" value="{{ request()->get('email')}}">
            <x-form-input type="password" name="password" placeholder="Enter new password" />
            <x-form-input type="password" name="password_confirmation" label="Repeat password"
                placeholder="Repeat password" />
            <x-form-button label="Reset Password" />
        </form>
    </div>
</x-layout>