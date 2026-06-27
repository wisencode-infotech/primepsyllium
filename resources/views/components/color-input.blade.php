@props(['name', 'label', 'value' => null, 'default' => '#000000', 'help' => null])

<div x-data="{ color: @js($value ?: $default) }">
    <x-input-label :for="$name" :value="$label" />

    <div class="mt-1 flex items-center gap-3">
        <label
            for="{{ $name }}_picker"
            :style="{ backgroundColor: color }"
            class="h-10 w-10 shrink-0 cursor-pointer rounded-md border border-border shadow-sm"
        ></label>

        <input x-model="color" id="{{ $name }}_picker" type="color" class="sr-only">

        <input
            x-model="color"
            id="{{ $name }}"
            name="{{ $name }}"
            type="text"
            maxlength="7"
            pattern="^#[0-9A-Fa-f]{6}$"
            placeholder="{{ $default }}"
            class="block w-32 rounded-md border-border bg-surface-elevated text-text shadow-sm focus:border-primary focus:ring-focus"
        >
    </div>

    @if ($help)
        <p class="mt-1 text-xs text-text-muted">{{ $help }}</p>
    @endif
</div>
