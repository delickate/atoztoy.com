<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_company_profiles_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->string('owner_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('email_address')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('detail_description')->nullable();

            $table->string('logo_image')->nullable();
            $table->string('banner_image')->nullable();

            $table->text('address')->nullable();

            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('youtube_link')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();

            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};

