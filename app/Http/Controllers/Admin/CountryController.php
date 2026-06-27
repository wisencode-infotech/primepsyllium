<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['sort_order'] = (int) Country::query()->max('sort_order') + 1;

        if ($request->hasFile('flag')) {
            $data['flag'] = $request->file('flag')->store('countries', 'public');
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

        if ($request->hasFile('flag')) {
            if ($country->flag) {
                Storage::disk('public')->delete($country->flag);
            }

            $data['flag'] = $request->file('flag')->store('countries', 'public');
        }

        $country->update($data);

        return redirect()->route('admin.countries.index')->with('status', 'Country updated successfully.');
    }

    public function destroy(Country $country): RedirectResponse
    {
        if ($country->flag) {
            Storage::disk('public')->delete($country->flag);
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
}
