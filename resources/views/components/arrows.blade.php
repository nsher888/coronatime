@props(['sort_order', 'is_sorted', 'sort_by'])

<div class="flex items-center gap-1 md:gap-2">

    <a href="{{ request()->fullUrlWithQuery(['sort_by' => $sort_by, 'sort_order' => ($is_sorted && $sort_order == 'asc') ? 'desc' : 'asc']) }}"
        class="cursor-pointer">
        {{ $slot }}
    </a>
    <a href="{{ request()->fullUrlWithQuery(['sort_by' => $sort_by, 'sort_order' => ($is_sorted && $sort_order == 'asc') ? 'desc' : 'asc']) }}"
        class="cursor-pointer">
        <div class="flex flex-col gap-1">
            <svg width="10" height="6" viewBox="0 0 10 6"
                fill="{{ ($is_sorted && $sort_order == 'asc') ? '#010414' : '#BFC0C4' }}"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" />
            </svg>
            <svg width="10" height="6" viewBox="0 0 10 6"
                fill="{{ ($is_sorted && $sort_order == 'desc') ? '#010414' : '#BFC0C4' }}"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5.00001 5.5L7.62939e-06 0.5H10L5.00001 5.5Z" />
            </svg>
        </div>
    </a>
</div>