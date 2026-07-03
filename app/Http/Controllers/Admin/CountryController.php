<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index(): View
    {
        $countries = Country::query()->ordered()->get();

        return view('backend.countries.index', compact('countries'));
    }

    public function create(): View
    {
        return view('backend.countries.create');
    }

    public function store(CountryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $data['show_in_footer'] = $request->boolean('show_in_footer');
        $data['has_page'] = $request->boolean('has_page');
        $data['sort_order'] = (int) Country::query()->max('sort_order') + 1;
        $data['slug'] = $this->uniqueSlug($data['name']);
        $data['cities'] = $this->parseCities($request->input('cities'));
        $data['faqs'] = $this->parseFaqs($request->input('faqs', []));

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('countries', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('countries', 'public');
        }

        Country::query()->create($data);

        return redirect()->route('admin.countries.index')->with('status', 'Country created successfully.');
    }

    public function edit(Country $country): View
    {
        return view('backend.countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $data['show_in_footer'] = $request->boolean('show_in_footer');
        $data['has_page'] = $request->boolean('has_page');
        $data['cities'] = $this->parseCities($request->input('cities'));
        $data['faqs'] = $this->parseFaqs($request->input('faqs', []));

        if ($request->hasFile('flag')) {
            if ($country->flag) {
                Storage::disk('public')->delete($country->flag);
            }

            $data['flag'] = $request->file('flag')->store('countries', 'public');
        }

        if ($request->hasFile('banner_image')) {
            if ($country->banner_image) {
                Storage::disk('public')->delete($country->banner_image);
            }

            $data['banner_image'] = $request->file('banner_image')->store('countries', 'public');
        }

        $country->update($data);

        return redirect()->route('admin.countries.index')->with('status', 'Country updated successfully.');
    }

    public function destroy(Country $country): RedirectResponse
    {
        if ($country->flag) {
            Storage::disk('public')->delete($country->flag);
        }

        if ($country->banner_image) {
            Storage::disk('public')->delete($country->banner_image);
        }

        $country->delete();

        return redirect()->route('admin.countries.index')->with('status', 'Country deleted successfully.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $ids = $request->input('order', []);

        foreach ($ids as $index => $id) {
            Country::query()->whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }

    private function uniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $original = $slug;
        $suffix = 2;

        while (Country::query()->where('slug', $slug)->exists()) {
            $slug = $original.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    private function parseCities(?string $cities): array
    {
        if (! $cities) {
            return [];
        }

        return collect(preg_split('/[\r\n,]+/', $cities))
            ->map(fn ($city) => trim($city))
            ->filter()
            ->values()
            ->all();
    }

    private function parseFaqs(array $faqs): array
    {
        return collect($faqs)
            ->map(fn ($faq) => [
                'question' => trim($faq['question'] ?? ''),
                'answer' => trim($faq['answer'] ?? ''),
            ])
            ->filter(fn ($faq) => $faq['question'] !== '' && $faq['answer'] !== '')
            ->values()
            ->all();
    }
}
