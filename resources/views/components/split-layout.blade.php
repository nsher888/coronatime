<div class="flex justify-between min-h-screen">
    <div class="py-10 px-28">
        <img src="{{ asset('images/coronatime-logo.png') }}" alt="Page logo" class="mb-14">
        {{ $slot }}
    </div>

    <div>
        <img class="h-full" src="{{ asset('images/bg.png') }}" alt="Background">
    </div>
</div>