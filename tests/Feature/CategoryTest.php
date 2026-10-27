<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_admin_can_create_category(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Storage::fake('public');

        $response = $this->post(route('categories.store'), [
            'name' => 'Toys',
            'images' => UploadedFile::fake()->image('toys.png'),
        ]);

        $response->assertRedirect(route('categories.index'))
            ->assertSessionHas('success', 'Category created successfully.');

        $this->assertDatabaseHas('categories', [
            'name' => 'Toys',
        ]);
    }

    public function test_home_page_displays_category_images(): void
    {
        Category::create([
            'name' => 'Books',
            'images' => 'images/categories/books.png',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('images/categories/books.png');
    }
}
