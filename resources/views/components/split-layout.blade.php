<div class="grid min-h-screen grid-cols-5">
    <div class="col-span-3 py-10 px-28">
        <a href="">
            <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo" class="mb-14">

        </a>
        {{ $slot }}
    </div>

    <div class="col-span-2">
        <img class="w-full h-full max-h-screen" src="{{ asset('images/bg.png') }}" alt="Background">
    </div>
</div>