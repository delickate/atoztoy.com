<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $companyProfiles = CompanyProfile::latest('id')->paginate(10);

        return view('company_profiles.index', compact('companyProfiles'));
    }

    public function create()
    {
        return redirect()->route('company-profiles.index');
        //return view('company_profiles.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('logo_image')) {
            $validated['logo_image'] = $request->file('logo_image')
                ->store('company_profiles/logos', 'public');
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')
                ->store('company_profiles/banners', 'public');
        }

        $validated['created_by'] = Auth::id() ?? 1;
        $validated['updated_by'] = Auth::id() ?? 1;

        CompanyProfile::create($validated);

        return redirect()
            ->route('company-profiles.index')
            ->with('success', 'Company profile created successfully.');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        return view('company_profiles.edit', compact('companyProfile'));
    }

    public function update(Request $request, CompanyProfile $companyProfile)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('logo_image')) {
            if ($companyProfile->logo_image) {
                Storage::disk('public')->delete($companyProfile->logo_image);
            }

            $validated['logo_image'] = $request->file('logo_image')
                ->store('company_profiles/logos', 'public');
        }

        if ($request->hasFile('banner_image')) {
            if ($companyProfile->banner_image) {
                Storage::disk('public')->delete($companyProfile->banner_image);
            }

            $validated['banner_image'] = $request->file('banner_image')
                ->store('company_profiles/banners', 'public');
        }

        $validated['updated_by'] = Auth::id() ?? 1;

        $companyProfile->update($validated);

        return redirect()
            ->route('company-profiles.index')
            ->with('success', 'Company profile updated successfully.');
    }

    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'owner_name' => ['nullable', 'string', 'max:255'],
            'phone_no' => ['nullable', 'string', 'max:50'],
            'fax_no' => ['nullable', 'string', 'max:50'],
            'email_address' => ['nullable', 'email', 'max:255'],

            'short_description' => ['nullable', 'string'],
            'detail_description' => ['nullable', 'string'],

            'logo_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'banner_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],

            'address' => ['nullable', 'string'],

            'twitter_link' => ['nullable', 'url', 'max:255'],
            'facebook_link' => ['nullable', 'url', 'max:255'],
            'instagram_link' => ['nullable', 'url', 'max:255'],
            'tiktok_link' => ['nullable', 'url', 'max:255'],
            'linkedin_link' => ['nullable', 'url', 'max:255'],
            'youtube_link' => ['nullable', 'url', 'max:255'],
        ]);
    }
}

