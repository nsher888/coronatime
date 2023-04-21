@props(['sort_order', 'is_sorted'])

<div class="flex flex-col gap-1">
    <svg width="10" height="6" viewBox="0 0 10 6"
        fill="{{ ($is_sorted && $sort_order == 'asc') ? '#010414' : '#BFC0C4' }}" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 0.5L10 5.5L0 5.5L5 0.5Z" />
    </svg>
    <svg width="10" height="6" viewBox="0 0 10 6"
        fill="{{ ($is_sorted && $sort_order == 'desc') ? '#010414' : '#BFC0C4' }}" xmlns="http://www.w3.org/2000/svg">
        <path d="M5.00001 5.5L7.62939e-06 0.5H10L5.00001 5.5Z" />
    </svg>
</div>