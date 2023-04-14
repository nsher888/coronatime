<x-layout>
    <x-split-layout>
        <h1 class="mb-4 text-2xl font-extrabold">Welcome Back</h1>
        <p class="mb-6 text-lg text-zinc-500">Welcome back! Please enter you details</p>
        <form class="max-w-sm" action="">
            <div class="flex flex-col gap-2 mb-6">
                <label class="font-bold text-slate-950" for="username">Username</label>
                <input type="text" name="username" id="username"
                    class="py-4 pl-5 border border-gray-200 rounded-lg placeholder-zinc-500 text-slate-950 "
                    placeholder="Enter unique username or email">
            </div>

            <div class="flex flex-col gap-2 mb-6">
                <label class="font-bold text-slate-900" for="password">Password</label>
                <input type="password" name="password" id="password"
                    class="py-4 pl-5 border border-gray-200 rounded-lg placeholder-zinc-500 text-slate-950"
                    placeholder="Enter your password">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-2">
                    <input
                        class="w-5 h-5 text-green-600 border border-gray-200 rounded form-checkbox focus:ring-0 or focus:ring-transparent"
                        type="checkbox" name="remember" id="remember">
                    <label class="text-sm font-semibold text-slate-950" for="remember">Remember this device</label>
                </div>

                <a href="" class="text-sm font-semibold text-blue-700">Forgot password?</a>
            </div>

            <button class="w-full py-4 mb-6 font-extrabold text-white bg-green-500 rounded-lg">LOG IN</button>

            <div class="flex self-center justify-center gap-2">
                <p class="text-zinc-500">Don't have an account?</p>
                <a class="font-bold text-slate-950" href="">Sign up for free</a>
            </div>
        </form>
    </x-split-layout>
</x-layout>