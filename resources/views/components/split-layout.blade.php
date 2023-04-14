<div class="grid min-h-screen grid-cols-5">
    <div class="col-span-5 px-4 py-10 md:px-28 md:col-span-3">
        <a href="">
            <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo" class="inline-block mb-10 md:mb-14">
        </a>
        {{ $slot }}
    </div>

    <div class="hidden col-span-2 md:block">
        <img class="w-full h-full max-h-screen" src="{{ asset('images/bg.png') }}" alt="Background">
    </div>
</div>