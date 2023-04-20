<div class="border-b-2">
    <div x-data="{ isOpen: false }"
        class="relative z-10 flex items-center justify-between px-4 py-5 mx-auto md:px-0 max-w-7xl">
        <div>
            <img src="{{ asset('images/logo-2.png') }}" alt="Logo">
        </div>

        <div class="ml-12 md:hidden">
            <x-language />

        </div>

        <div class="flex items-center md:hidden">
            <button @click="isOpen = !isOpen"
                class="inline-flex items-center justify-center p-2 text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="block w-6 h-6" x-show="!isOpen" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_137_9)">
                        <path d="M3 4H21V6H3V4ZM9 11H21V13H9V11ZM3 18H21V20H3V18Z" fill="#09121F" />
                    </g>
                    <defs>
                        <clipPath id="clip0_137_9">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

                <svg x-show="isOpen" class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="items-center hidden gap-5 md:flex">
            <div>
                <x-language />
            </div>
            <p class="pr-4 font-bold border-r">{{ auth()->user()->username }}</p>
            <form method="POST" action="{{ route('logout', app()->getLocale()) }}">
                @csrf
                <button type="submit">{{ __('auth.logout') }}</button>
            </form>
        </div>

        <div x-show="isOpen" class="absolute z-10 right-2 top-full md:hidden">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="pt-4 pb-3 border-t border-gray-200">
                    <div class="flex flex-col items-center justify-center gap-2 px-5">
                        <p class="font-bold">{{ auth()->user()->username }}</p>
                        <form method="POST" action="{{ route('logout', app()->getLocale()) }}">
                            @csrf
                            <button type="submit">{{ __('auth.logout') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>