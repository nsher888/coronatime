<x-layout>
    <x-header />

    <div class="px-4 mx-auto max-w-7xl md:px-0">
        <h1 class="mt-10 text-2xl font-extrabold text-zinc-950">{{ __('dashboard.worldwide_stat') }}</h1>

        <div class="flex gap-4 mt-10 border-b md:gap-20 border-neutral-100">
            <a href="{{ route('dashboard', app()->getLocale()) }}">{{ __('dashboard.worldwide') }}</a>
            <a class="border-b-[3px] border-slate-950 pb-4 font-semibold">{{ __('dashboard.by_country') }}</a>
        </div>

        <form class="mt-6 md:mt-10">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.3333 19.3332L14 13.9998M8.66667 16.6665C4.24839 16.6665 0.666672 13.0848 0.666672 8.6665C0.666672 4.24823 4.24839 0.666504 8.66667 0.666504C13.0849 0.666504 16.6667 4.24823 16.6667 8.6665C16.6667 13.0848 13.0849 16.6665 8.66667 16.6665Z"
                            stroke="#010414" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm border-transparent rounded-lg md:border-neutral-200 md:max-w-xs text-zinc-500 "
                    placeholder="{{ __('dashboard.search_by_country') }}">

            </div>
        </form>


        <div class="relative md:max-h-[600px] mt-4 md:mt-10 overflow-auto shadow-box-sm mb-14">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-zinc-950 h-14 bg-neutral-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{ __('dashboard.location') }}
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{ __('dashboard.new_cases') }}
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{ __('dashboard.recovered') }}
                        </th>
                        <th scope="col" class="px-6 py-3 font-semibold">
                            {{ __('dashboard.deaths') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                    <tr class="bg-white border-b border-neutral-100">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            Worldwide
                        </th>
                        <td class="px-6 py-4">
                            9,704,000
                        </td>
                        <td class="px-6 py-4">
                            66,591
                        </td>
                        <td class="px-6 py-4">
                            5,803,905
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>


</x-layout>