@props(['type', 'name', 'placeholder', 'label' => null,])

<div class="flex flex-col gap-2 mb-4 md:mb-6">
    <label class="font-bold text-slate-950" for="{{ $name }}">{{ $label ?? ucfirst($name) }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="py-4 pl-5 border border-gray-200 rounded-lg placeholder-zinc-500 text-slate-950 "
        placeholder="{{ $placeholder }}" value="{{ old($name) }}">

    @error($name)
    <div class="flex items-center gap-2">
        <img src="{{ asset('images/error-icon.png') }}" alt="error">
        <p class="text-sm text-red-700">{{ $message }}</p>
    </div>
    @enderror
</div>