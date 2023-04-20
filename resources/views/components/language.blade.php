<div x-data="{ isOpen: false, currentLocale: '{{ app()->getLocale() }}', locales: ['en', 'ka'] }" class="relative">
    <button @click="isOpen = !isOpen"
        class="inline-flex items-center px-4 py-2 rounded text-zinc-950 hover:bg-gray-100">
        <span x-text="currentLocale === 'en' ? 'English' : 'Georgian'"></span>
        <svg class="ml-2" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.19995 1.3999L5.99995 6.1999L10.8 1.3999" stroke="#010414" stroke-linecap="square" />
        </svg>

    </button>
    <ul x-show="isOpen" @click.away="isOpen = false" class="absolute w-24 py-2 mt-1 bg-white rounded-lg shadow-lg">
        <template x-for="locale in locales" :key="locale">
            <li x-show="currentLocale != locale">
                <a @click.prevent="currentLocale = locale; isOpen = false; window.location.href = `/${locale}/` + window.location.pathname.split('/').pop()"
                    class="block px-4 py-2 hover:bg-gray-100" x-text="locale === 'en' ? 'English' : 'Georgian'"></a>
            </li>
        </template>
    </ul>
</div>