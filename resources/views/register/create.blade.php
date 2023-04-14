<x-layout>
    <x-split-layout>
        <x-form-header title="Welcome to Coronatime" subtitle="Please, enter required info to sign up" />
        <form class="max-w-sm" method="POST" action="{{ route('register.store') }}">
            @csrf
            <x-form-input type="text" name="username" placeholder="Enter unique username" />
            <x-form-input type="email" name="email" placeholder="Enter unique email" />
            <x-form-input type="password" name="password" placeholder="Enter your password" />
            <x-form-input type="password" name="password_confirmation" label="Repeat password"
                placeholder="Repeat password" />
            <x-form-button label="sign up" />
            <div class="flex self-center justify-center gap-2">
                <p class="text-zinc-500">Already have an account?</p>
                <a class="font-bold text-slate-950" href="">Log in</a>
            </div>
        </form>
    </x-split-layout>
</x-layout>