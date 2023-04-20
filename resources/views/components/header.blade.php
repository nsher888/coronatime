<div class="border-b-2">
    <div class="flex items-center justify-between py-5 mx-auto max-w-7xl">
        <div>
            <img src="{{ asset('images/logo-2.png') }}" alt="Logo">
        </div>



        <div class="flex items-center gap-5">

            <div>
                <x-language />
            </div>
            <p>{{ auth()->user()->username }}</p>

            <form method="POST" action="{{ route('logout', app()->getLocale()) }}">
                @csrf
                <button type="submit">{{ __('auth.logout') }}</button>
            </form>
        </div>
    </div>
</div>