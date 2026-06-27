@props(['name', 'label' => 'Image', 'value' => null])

<div x-data="{ preview: @js($value), fileName: null, original: @js($value), dragging: false }">
    <x-input-label :for="$name" :value="$label" />

    <label
        :for="$name"
        @dragover.prevent="dragging = true"
        @dragleave.prevent="dragging = false"
        @drop.prevent="
            dragging = false;
            const file = $event.dataTransfer.files[0];
            if (file) {
                $refs.{{ $name }}Input.files = $event.dataTransfer.files;
                fileName = file.name;
                preview = URL.createObjectURL(file);
            }
        "
        :class="dragging ? 'border-primary bg-primary-soft' : 'border-border bg-surface'"
        class="mt-1 flex cursor-pointer flex-col items-center justify-center gap-2 rounded-xl border-2 border-dashed px-6 py-8 text-center transition hover:border-primary hover:bg-primary-soft"
    >
        <template x-if="preview">
            <img :src="preview" class="h-28 w-28 rounded-lg border border-border bg-white object-contain p-1">
        </template>
        <template x-if="!preview">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-primary-soft text-primary">
                <x-icon name="upload" class="h-6 w-6" />
            </span>
        </template>

        <span class="text-sm font-medium text-text" x-text="fileName ?? 'Click to upload or drag and drop'"></span>
        <span class="text-xs text-text-muted">PNG, JPG or WEBP, up to 2MB</span>

        <button
            type="button"
            x-show="fileName"
            style="display: none;"
            @click.stop.prevent="fileName = null; preview = original; $refs.{{ $name }}Input.value = ''"
            class="mt-1 inline-flex items-center gap-1 text-xs font-medium text-text-muted hover:text-text"
        >
            <x-icon name="x" class="h-3.5 w-3.5" /> Remove selected file
        </button>

        <input
            x-ref="{{ $name }}Input"
            id="{{ $name }}"
            name="{{ $name }}"
            type="file"
            accept="image/*"
            class="hidden"
            @change="
                const file = $event.target.files[0];
                if (file) {
                    fileName = file.name;
                    preview = URL.createObjectURL(file);
                }
            "
        >
    </label>

    @if ($value)
        <p class="mt-1 text-sm text-text-muted">Leave blank to keep the current image.</p>
    @endif
</div>
