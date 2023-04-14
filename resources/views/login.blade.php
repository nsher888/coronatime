<x-layout>
    <x-split-layout>
        <x-form-header title="Welcome back" subtitle="Welcome back! Please enter you details" />
        <form class="max-w-sm" action="">
            <x-form-input type="text" name="username" placeholder="Enter unique username or email" />
            <x-form-input type="password" name="password" placeholder="Enter your password" />
            <div class="flex items-center justify-between mb-6">
                <x-form-checkbox name="remember" label="Remember this device" />
                <a href="" class="text-sm font-semibold text-blue-700">Forgot password?</a>
            </div>

            <x-form-button label="log in" />
            <div class="flex self-center justify-center gap-2">
                <p class="text-zinc-500">Don't have an account?</p>
                <a class="font-bold text-slate-950" href="">Sign up for free</a>
            </div>
        </form>
    </x-split-layout>
</x-layout>