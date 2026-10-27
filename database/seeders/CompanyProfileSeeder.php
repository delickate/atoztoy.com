<?php

// database/seeders/CompanyProfileSeeder.php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::create([
            'company_name' => 'ABC Technologies',
            'owner_name' => 'John Doe',
            'phone_no' => '+92 300 1234567',
            'fax_no' => '+92 51 1234567',
            'email_address' => 'info@abctech.com',

            'short_description' => 'A leading technology company providing modern digital solutions.',

            'detail_description' => 'ABC Technologies provides web development, mobile applications, cloud solutions and digital transformation services to businesses worldwide.',

            'logo_image' => null,
            'banner_image' => null,

            'address' => 'Islamabad, Pakistan',

            'twitter_link' => 'https://twitter.com/abctech',
            'facebook_link' => 'https://facebook.com/abctech',
            'instagram_link' => 'https://instagram.com/abctech',
            'tiktok_link' => 'https://tiktok.com/@abctech',
            'linkedin_link' => 'https://linkedin.com/company/abctech',
            'youtube_link' => 'https://youtube.com/@abctech',

            'created_by' => 1,
            'updated_by' => 1,
        ]);

        CompanyProfile::create([
            'company_name' => 'XYZ Solutions',
            'owner_name' => 'Jane Smith',
            'phone_no' => '+92 321 9876543',
            'email_address' => 'hello@xyzsolutions.com',

            'short_description' => 'Professional business and software solutions.',

            'detail_description' => 'XYZ Solutions specializes in enterprise software, consulting and business automation solutions.',

            'address' => 'Lahore, Pakistan',

            'facebook_link' => 'https://facebook.com/xyzsolutions',
            'linkedin_link' => 'https://linkedin.com/company/xyzsolutions',

            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}

