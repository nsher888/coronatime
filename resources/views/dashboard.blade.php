<x-layout>
    <x-header />

    <div class="px-4 mx-auto max-w-7xl md:px-0">
        <h1 class="mt-10 text-2xl font-extrabold text-zinc-950">{{ __('dashboard.worldwide_stat') }}</h1>

        <div class="flex gap-4 mt-10 border-b md:gap-20 border-neutral-100">
            <a class="border-b-[3px] border-slate-950 pb-4 font-semibold">{{ __('dashboard.worldwide') }}</a>
            <a href="{{ route('country-dashboard', app()->getLocale()) }}">{{ __('dashboard.by_country') }}</a>
        </div>

        <div class="flex flex-wrap justify-between gap-4 mt-10 md:gap-6">
            <div class="w-full h-48 md:h-64 md:flex-1 rounded-2xl bg-blue-rgba shadow-box-sm">
                <div class="flex flex-col items-center justify-center h-full">
                    <svg class="mb-6" width="92" height="65" viewBox="0 0 92 65" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M48.7348 36.5C16.4144 36.5 41.2762 46 1 48.5V65H91V1C81.5525 9.5 82.0497 22.5 68.6243 22.5C55.1989 22.5 60.6685 36.5 48.7348 36.5Z"
                            fill="url(#paint0_linear_5133_25)" />
                        <path
                            d="M1 48.5C41.2762 46 16.4144 36.5 48.7348 36.5C60.6685 36.5 55.1989 22.5 68.6243 22.5C82.0497 22.5 81.5525 9.5 91 1"
                            stroke="#2029F3" stroke-width="2" />
                        <defs>
                            <linearGradient id="paint0_linear_5133_25" x1="46.2486" y1="-22.5" x2="45.9972" y2="65"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2029F3" stop-opacity="0.24" />
                                <stop offset="1" stop-color="#2029F3" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <h2 class="mb-4 font-medium md:text-xl">{{ __('dashboard.new_cases') }}</h2>
                    <h3 class="text-2xl font-extrabold text-blue-700 md:text-4xl">{{ $new_cases }}</h3>
                </div>
            </div>
            <div class="flex-1 h-48 md:h-64 rounded-2xl bg-green-rgba shadow-box-sm">
                <div class="flex flex-col items-center justify-center h-full">
                    <svg class="mb-6" width="92" height="65" viewBox="0 0 92 41" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M44 18.5C11.6796 18.5 41.2762 22 1 24.5V41H91V0C81.5525 8.5 82.0497 10.5 68.6243 10.5C55.1989 10.5 55.9337 18.5 44 18.5Z"
                            fill="url(#paint0_linear_5133_41)" />
                        <path
                            d="M1 24.5C41.2762 22 13.6796 18 46 18C57.9337 18 56.0746 11 69.5 11C82.9254 11 81.5525 9.5 91 1"
                            stroke="#0FBA68" stroke-width="2" />
                        <defs>
                            <linearGradient id="paint0_linear_5133_41" x1="46.2486" y1="-46.5" x2="45.9972" y2="41"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#0FBA68" stop-opacity="0.24" />
                                <stop offset="1" stop-color="#0FBA68" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <h2 class="mb-4 font-medium md:text-xl">{{ __('dashboard.recovered') }}</h2>
                    <h3 class="text-2xl font-extrabold text-green-600 md:text-4xl">{{ $recovered }}</h3>
                </div>
            </div>
            <div class="flex-1 h-48 md:h-64 rounded-2xl bg-yellow-rgba shadow-box-sm">
                <div class="flex flex-col items-center justify-center h-full">
                    <svg class="mb-6" width="92" height="65" viewBox="0 0 92 52" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M48.7348 23.5C16.4144 23.5 41.2762 33 1 35.5V52H91V1.5C81.5525 10 82.0497 9.5 68.6243 9.5C55.1989 9.5 60.6685 23.5 48.7348 23.5Z"
                            fill="url(#paint0_linear_5133_33)" />
                        <path
                            d="M1 35.5C41.2762 33 16.4144 23.5 48.7348 23.5C60.6685 23.5 55.1989 9.5 68.6243 9.5C82.0497 9.5 81.5525 10 91 1.5"
                            stroke="#EAD621" stroke-width="2" />
                        <defs>
                            <linearGradient id="paint0_linear_5133_33" x1="46.2486" y1="-35.5" x2="45.9972" y2="52"
                                gradientUnits="userSpaceOnUse">
                                <stop stop-color="#EAD621" stop-opacity="0.24" />
                                <stop offset="1" stop-color="#EAD621" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <h2 class="mb-4 font-medium md:text-xl">{{ __('dashboard.deaths') }}</h2>
                    <h3 class="text-2xl font-extrabold text-yellow-400 md:text-4xl">{{ $deaths }}</h3>
                </div>
            </div>
        </div>
    </div>


</x-layout>