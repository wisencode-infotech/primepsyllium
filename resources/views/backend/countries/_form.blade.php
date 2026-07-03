@csrf
@isset($country)
    @method('PUT')
@endisset

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

    {{-- Main content column --}}
    <div class="lg:col-span-2 space-y-6">

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Country Basics</h3>

            <div>
                <x-input-label for="name" value="Country Name" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $country->name ?? '')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="cities" value="Major Cities Supplied" />
                <p class="text-xs text-text-muted mb-1">One city per line (or comma-separated). Shown as "Major Cities We Supply Psyllium Products" on the country page.</p>
                <textarea id="cities" name="cities" rows="4" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" placeholder="New York&#10;Houston&#10;Dallas">{{ old('cities', isset($country) ? implode("\n", $country->cities ?? []) : '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('cities')" />
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Page Content</h3>

            <div>
                <x-input-label for="intro_content" value="Introduction" />
                <div data-quill="#intro_content" class="mt-1"></div>
                <textarea id="intro_content" name="intro_content" class="hidden">{{ old('intro_content', $country->intro_content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('intro_content')" />
            </div>

            <div>
                <x-input-label for="market_demand_content" value="Market Demand" />
                <div data-quill="#market_demand_content" class="mt-1"></div>
                <textarea id="market_demand_content" name="market_demand_content" class="hidden">{{ old('market_demand_content', $country->market_demand_content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('market_demand_content')" />
            </div>

            <div>
                <x-input-label for="export_capability_content" value="Export Capability" />
                <div data-quill="#export_capability_content" class="mt-1"></div>
                <textarea id="export_capability_content" name="export_capability_content" class="hidden">{{ old('export_capability_content', $country->export_capability_content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('export_capability_content')" />
            </div>

            <div>
                <x-input-label for="quality_standards_content" value="Quality Standards" />
                <div data-quill="#quality_standards_content" class="mt-1"></div>
                <textarea id="quality_standards_content" name="quality_standards_content" class="hidden">{{ old('quality_standards_content', $country->quality_standards_content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('quality_standards_content')" />
            </div>

            <div>
                <x-input-label for="export_logistics_content" value="Export Logistics" />
                <div data-quill="#export_logistics_content" class="mt-1"></div>
                <textarea id="export_logistics_content" name="export_logistics_content" class="hidden">{{ old('export_logistics_content', $country->export_logistics_content ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('export_logistics_content')" />
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4" x-data="faqRepeater(@js(old('faqs', $country->faqs ?? [])))">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Frequently Asked Questions</h3>

            <template x-for="(faq, index) in rows" :key="index">
                <div class="border border-border rounded-md p-3 space-y-2">
                    <div class="flex items-start gap-2">
                        <div class="flex-1 space-y-2">
                            <input type="text" :name="'faqs[' + index + '][question]'" x-model="faq.question" placeholder="Question" class="block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted text-sm">
                            <textarea :name="'faqs[' + index + '][answer]'" x-model="faq.answer" rows="2" placeholder="Answer" class="block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted text-sm"></textarea>
                        </div>
                        <button type="button" @click="remove(index)" class="shrink-0 text-danger hover:text-red-700 transition mt-1" title="Remove question">
                            <x-icon name="x" class="h-4 w-4" />
                        </button>
                    </div>
                </div>
            </template>

            <button type="button" @click="add()" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium border border-border rounded-md text-text-muted hover:bg-surface-muted transition">
                <x-icon name="plus" class="h-3.5 w-3.5" />
                Add Question
            </button>
        </div>

    </div>

    {{-- Sidebar column --}}
    <div class="space-y-6">

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">Visibility</h3>

            <div class="flex items-center gap-2">
                <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $country->is_active ?? true) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
                <x-input-label for="is_active" value="Show this country on the website" />
            </div>

            <div class="flex items-center gap-2">
                <input id="show_in_footer" name="show_in_footer" type="checkbox" value="1" {{ old('show_in_footer', $country->show_in_footer ?? false) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
                <x-input-label for="show_in_footer" value="Also show in the footer's Countries list" />
            </div>
            <p class="text-xs text-text-muted">
                Only a handful of countries should appear in the footer to keep it compact — the rest are summarized as "+N countries".
            </p>

            <div class="flex items-center gap-2 pt-1">
                <input id="has_page" name="has_page" type="checkbox" value="1" {{ old('has_page', $country->has_page ?? false) ? 'checked' : '' }} class="rounded border-border text-primary focus:ring-focus">
                <x-input-label for="has_page" value="Enable detail page" />
            </div>
            <p class="text-xs text-text-muted">
                When enabled, the country name becomes a link to its own page{{ isset($country) && $country->url ? " ({$country->url})" : '' }} wherever it's listed on the site.
            </p>

            <div class="pt-2 flex items-center gap-3">
                <x-primary-button>{{ isset($country) ? 'Update Country' : 'Create Country' }}</x-primary-button>
                <a href="{{ route('admin.countries.index') }}" class="text-sm text-text-muted hover:text-text">Cancel</a>
            </div>
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3 mb-4">Flag Image</h3>
            <x-image-upload name="flag" label="Flag Image" :value="$country->image_url ?? null" />
            <x-input-error class="mt-2" :messages="$errors->get('flag')" />
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3 mb-4">Banner Image</h3>
            <p class="text-xs text-text-muted mb-2">Shown as the background of the country page's hero section.</p>
            <x-image-upload name="banner_image" label="Banner Image" :value="$country->banner_image_url ?? null" hint="PNG, JPG or WEBP, up to 4MB" />
            <x-input-error class="mt-2" :messages="$errors->get('banner_image')" />
        </div>

        <div class="p-4 sm:p-6 bg-surface-elevated shadow sm:rounded-lg space-y-4">
            <h3 class="text-sm font-semibold text-text border-b border-border pb-3">SEO</h3>

            <div>
                <x-input-label for="seo_title" value="SEO Title" />
                <x-text-input id="seo_title" name="seo_title" type="text" class="mt-1 block w-full" :value="old('seo_title', $country->seo_title ?? '')" placeholder="Optional SEO title…" />
                <x-input-error class="mt-2" :messages="$errors->get('seo_title')" />
            </div>

            <div>
                <x-input-label for="seo_description" value="SEO Description" />
                <textarea id="seo_description" name="seo_description" rows="2" class="mt-1 block w-full border-border focus:border-primary focus:ring-focus rounded-md shadow-sm bg-surface-elevated text-text placeholder:text-text-muted" placeholder="Optional meta description…">{{ old('seo_description', $country->seo_description ?? '') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('seo_description')" />
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
function faqRepeater(initial) {
    return {
        rows: initial && initial.length ? initial.map(f => ({ question: f.question || '', answer: f.answer || '' })) : [{ question: '', answer: '' }],
        add() {
            this.rows.push({ question: '', answer: '' });
        },
        remove(index) {
            this.rows.splice(index, 1);
            if (this.rows.length === 0) {
                this.add();
            }
        },
    };
}
</script>
@endpush
