<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profiles';

    public $timestamps = false;

    protected $fillable = [
        'company_name',
        'owner_name',
        'phone_no',
        'fax_no',
        'email_address',
        'short_description',
        'detail_description',
        'logo_image',
        'banner_image',
        'address',
        'twitter_link',
        'facebook_link',
        'instagram_link',
        'tiktok_link',
        'linkedin_link',
        'youtube_link',
        'created_by',
        'updated_by',
    ];
}

