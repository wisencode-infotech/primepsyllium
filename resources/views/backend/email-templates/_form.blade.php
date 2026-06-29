@csrf
@isset($emailTemplate)
    @method('PUT')
@endisset

<div class="p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
    <h3 class="font-semibold text-text mb-1">Template Details</h3>
    <p class="text-sm text-text-muted mb-6">Identify this template and write the subject line used when it's sent.</p>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <x-input-label for="name" value="Template Name" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $emailTemplate->name ?? '')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="slug" value="Slug" />
            <x-text-input
                id="slug"
                name="slug"
                type="text"
                class="mt-1 block w-full"
                :value="old('slug', $emailTemplate->slug ?? '')"
                required
                :readonly="isset($emailTemplate) && $emailTemplate->slug === \App\Models\EmailTemplate::CONTACT_INQUIRY_SLUG"
            />
            <p class="mt-1 text-xs text-text-muted">Used by the application to look up this template. Letters, numbers, dashes and underscores only.</p>
            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
        </div>
    </div>

    <div class="mt-6">
        <x-input-label for="subject" value="Email Subject" />
        <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" :value="old('subject', $emailTemplate->subject ?? '')" x-model="subject" required />
        <x-input-error class="mt-2" :messages="$errors->get('subject')" />
    </div>
</div>

<div class="mt-6 p-4 sm:p-8 bg-surface-elevated shadow sm:rounded-lg">
    <h3 class="font-semibold text-text mb-1">Email Content</h3>
    <p class="text-sm text-text-muted mb-6">Format the body using the toolbar below. The preview on the right updates as you type.</p>

    <div>
        <x-input-label for="body" value="Email Body" />
        <div data-quill="#body" class="mt-1"></div>
        <textarea id="body" name="body" class="hidden" x-model="body">{{ old('body', $emailTemplate->body ?? '') }}</textarea>
        <x-input-error class="mt-2" :messages="$errors->get('body')" />
    </div>

    <div class="mt-6 rounded-md border border-border bg-surface p-4">
        <p class="text-sm font-medium text-text mb-2">Available placeholders</p>
        <p class="text-xs text-text-muted mb-3">Insert these tokens into the subject or body — they're replaced with the visitor's submitted details when the email is sent.</p>
        <div class="grid grid-cols-1 gap-1.5 sm:grid-cols-2">
            @foreach (\App\Models\EmailTemplate::PLACEHOLDERS as $token => $description)
                <div class="flex items-center gap-2 text-xs">
                    <code class="rounded bg-primary-soft px-1.5 py-0.5 text-primary font-semibold">{{ $token }}</code>
                    <span class="text-text-muted">{{ $description }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-6 flex items-center gap-2">
        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $emailTemplate->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
        <x-input-label for="is_active" value="Active — used when sending this notification" />
    </div>

    <div class="mt-6 flex items-center gap-3">
        <x-primary-button>{{ isset($emailTemplate) ? 'Update Template' : 'Create Template' }}</x-primary-button>
        <a href="{{ route('admin.email-templates.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
    </div>
</div>
