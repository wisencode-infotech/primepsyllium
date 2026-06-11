@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted']) }}>
