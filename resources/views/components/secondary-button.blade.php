<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-surface-elevated border border-border rounded-md font-semibold text-xs text-text uppercase tracking-widest shadow-sm hover:bg-surface-muted focus:outline-none focus:ring-2 focus:ring-focus focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
