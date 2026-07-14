<x-backend-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-text leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="max-w-5xl mx-auto space-y-6">

        <div class="dashboard-hero rounded-2xl px-6 py-8 text-white sm:px-10">
            <h3 class="text-2xl font-semibold sm:text-3xl">Welcome back, {{ auth()->user()->name }}</h3>
            <p class="mt-2 max-w-xl text-sm text-white/80">
                Here's what's live on the Prime Psyllium homepage right now. Head over to Products or Certifications to add, edit, or reorder what your visitors see.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="admin-card rounded-xl border border-border bg-surface-elevated p-5">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wide text-text-muted">Total Products</span>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary-soft text-primary">
                        <x-icon name="box" class="h-5 w-5" />
                    </span>
                </div>
                <p class="mt-3 text-3xl font-semibold text-text">{{ $productsCount }}</p>
            </div>

            <div class="admin-card rounded-xl border border-border bg-surface-elevated p-5">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wide text-text-muted">Visible Products</span>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary-soft text-primary">
                        <x-icon name="box" class="h-5 w-5" />
                    </span>
                </div>
                <p class="mt-3 text-3xl font-semibold text-text">{{ $activeProductsCount }}</p>
            </div>

            <div class="admin-card rounded-xl border border-border bg-surface-elevated p-5">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wide text-text-muted">Total Certifications</span>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary-soft text-primary">
                        <x-icon name="badge" class="h-5 w-5" />
                    </span>
                </div>
                <p class="mt-3 text-3xl font-semibold text-text">{{ $certificationsCount }}</p>
            </div>

            <div class="admin-card rounded-xl border border-border bg-surface-elevated p-5">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wide text-text-muted">Visible Certifications</span>
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary-soft text-primary">
                        <x-icon name="badge" class="h-5 w-5" />
                    </span>
                </div>
                <p class="mt-3 text-3xl font-semibold text-text">{{ $activeCertificationsCount }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <a href="{{ route('admin.products.index') }}" class="admin-card group flex items-center gap-4 rounded-xl border border-border bg-surface-elevated p-5 transition hover:border-primary">
                <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                    <x-icon name="box" class="h-6 w-6" />
                </span>
                <span>
                    <span class="block text-sm font-semibold text-text">Manage Products</span>
                    <span class="block text-sm text-text-muted">Add, edit, reorder or hide homepage products.</span>
                </span>
                <x-icon name="chevron-right" class="ml-auto h-5 w-5 shrink-0 text-text-muted transition group-hover:text-primary" />
            </a>

            <a href="{{ route('admin.certifications.index') }}" class="admin-card group flex items-center gap-4 rounded-xl border border-border bg-surface-elevated p-5 transition hover:border-primary">
                <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-primary-soft text-primary">
                    <x-icon name="badge" class="h-6 w-6" />
                </span>
                <span>
                    <span class="block text-sm font-semibold text-text">Manage Certifications</span>
                    <span class="block text-sm text-text-muted">Add, edit, reorder or hide trust badges.</span>
                </span>
                <x-icon name="chevron-right" class="ml-auto h-5 w-5 shrink-0 text-text-muted transition group-hover:text-primary" />
            </a>
        </div>
    </div>
</x-backend-layout>
