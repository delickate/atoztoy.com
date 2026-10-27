<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Company Name *</label>

        <input
            type="text"
            name="company_name"
            class="form-control @error('company_name') is-invalid @enderror"
            value="{{ old('company_name', $companyProfile->company_name ?? '') }}"
            required
        >

        @error('company_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Owner Name</label>

        <input
            type="text"
            name="owner_name"
            class="form-control"
            value="{{ old('owner_name', $companyProfile->owner_name ?? '') }}"
        >
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Phone</label>

        <input
            type="text"
            name="phone_no"
            class="form-control"
            value="{{ old('phone_no', $companyProfile->phone_no ?? '') }}"
        >
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Fax</label>

        <input
            type="text"
            name="fax_no"
            class="form-control"
            value="{{ old('fax_no', $companyProfile->fax_no ?? '') }}"
        >
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>

        <input
            type="email"
            name="email_address"
            class="form-control"
            value="{{ old('email_address', $companyProfile->email_address ?? '') }}"
        >
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Short Description</label>

        <textarea
            name="short_description"
            class="form-control"
            rows="3"
        >{{ old('short_description', $companyProfile->short_description ?? '') }}</textarea>
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Detailed Description</label>

        <textarea
            name="detail_description"
            class="form-control"
            rows="6"
        >{{ old('detail_description', $companyProfile->detail_description ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Logo</label>

        <input
            type="file"
            name="logo_image"
            class="form-control"
            accept="image/*"
        >

        @if(isset($companyProfile) && $companyProfile->logo_image)
            <div class="mt-2">
                <img
                    src="{{ asset('storage/' . $companyProfile->logo_image) }}"
                    width="100"
                    alt="Logo"
                >
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Banner</label>

        <input
            type="file"
            name="banner_image"
            class="form-control"
            accept="image/*"
        >

        @if(isset($companyProfile) && $companyProfile->banner_image)
            <div class="mt-2">
                <img
                    src="{{ asset('storage/' . $companyProfile->banner_image) }}"
                    width="200"
                    alt="Banner"
                >
            </div>
        @endif
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Address</label>

        <textarea
            name="address"
            class="form-control"
            rows="3"
        >{{ old('address', $companyProfile->address ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Twitter</label>
        <input type="url" name="twitter_link" class="form-control"
               value="{{ old('twitter_link', $companyProfile->twitter_link ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Facebook</label>
        <input type="url" name="facebook_link" class="form-control"
               value="{{ old('facebook_link', $companyProfile->facebook_link ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Instagram</label>
        <input type="url" name="instagram_link" class="form-control"
               value="{{ old('instagram_link', $companyProfile->instagram_link ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">TikTok</label>
        <input type="url" name="tiktok_link" class="form-control"
               value="{{ old('tiktok_link', $companyProfile->tiktok_link ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">LinkedIn</label>
        <input type="url" name="linkedin_link" class="form-control"
               value="{{ old('linkedin_link', $companyProfile->linkedin_link ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">YouTube</label>
        <input type="url" name="youtube_link" class="form-control"
               value="{{ old('youtube_link', $companyProfile->youtube_link ?? '') }}">
    </div>

</div>
