<div class="border-b-2">
    <div class="flex items-center justify-between py-5 mx-auto max-w-7xl">
        <div>
            <img src="{{ asset('images/logo-2.png') }}" alt="Logo">
        </div>

        <div class="">
            <x-language />
        </div>

        <div class="flex gap-5">
            <p>{{ auth()->user()->username }}</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </div>
    </div>
</div>