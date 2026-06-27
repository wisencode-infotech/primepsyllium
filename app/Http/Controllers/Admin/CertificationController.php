<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificationRequest;
use App\Models\Certification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CertificationController extends Controller
{
    public function index(): View
    {
        $certifications = Certification::query()->ordered()->get();

        return view('backend.certifications.index', compact('certifications'));
    }

    public function create(): View
    {
        return view('backend.certifications.create');
    }

    public function store(CertificationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = (int) Certification::query()->max('sort_order') + 1;

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('certifications', 'public');
        }

        Certification::query()->create($data);

        return redirect()->route('admin.certifications.index')->with('status', 'Certification created successfully.');
    }

    public function edit(Certification $certification): View
    {
        return view('backend.certifications.edit', compact('certification'));
    }

    public function update(CertificationRequest $request, Certification $certification): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($certification->logo) {
                Storage::disk('public')->delete($certification->logo);
            }

            $data['logo'] = $request->file('logo')->store('certifications', 'public');
        }

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('status', 'Certification updated successfully.');
    }

    public function destroy(Certification $certification): RedirectResponse
    {
        if ($certification->logo) {
            Storage::disk('public')->delete($certification->logo);
        }

        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('status', 'Certification deleted successfully.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $ids = $request->input('order', []);

        foreach ($ids as $index => $id) {
            Certification::query()->whereKey($id)->update(['sort_order' => $index]);
        }

        return response()->json(['status' => 'ok']);
    }
}
