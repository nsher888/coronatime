<x-layout class="relative">
    <div class="flex justify-start pt-5 pl-4 md:pl-0 md:justify-center justify-self-start">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo">
    </div>

    <div class="absolute flex flex-col items-center transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <img src="{{ asset('images/check-circle.gif') }}" class="mb-4 w-14 h-14">
        <p class="text-lg text-slate-950">Your password has been updated successfuly</p>


        <a class="w-full py-4 mt-24 mb-6 font-extrabold text-center text-white transition-all duration-100 bg-green-500 rounded-lg hover:bg-green-600"
            href="{{ route('login.create') }}">SIGN IN</a>
    </div>
</x-layout>