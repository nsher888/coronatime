@props(['name', 'label'])

<div class="flex items-center gap-2">
    <input
        class="w-5 h-5 text-green-600 border border-gray-200 rounded form-checkbox focus:ring-0 or focus:ring-transparent"
        type="checkbox" name="{{ $name }}" id="{{ $name }}">
    <label class="text-sm font-semibold text-slate-950" for="{{ $name }}">{{ $label }}</label>
</div>