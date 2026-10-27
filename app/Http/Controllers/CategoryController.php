<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
            'images' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $validated['name'],
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ];

        if ($request->hasFile('images')) {
            $data['images'] = $request->file('images')->store('categories', 'public');
        }

        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
            'images' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $category->name = $validated['name'];
        $category->updated_by = Auth::id();

        if ($request->hasFile('images')) {
            if ($category->images && Storage::disk('public')->exists($category->images)) {
                Storage::disk('public')->delete($category->images);
            }

            $category->images = $request->file('images')->store('categories', 'public');
        }

        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        if ($category->images && Storage::disk('public')->exists($category->images)) {
            Storage::disk('public')->delete($category->images);
        }

        $category->deleted_by = Auth::id();
        $category->save();
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }

    public function show($category = null)
    {
        if ($category) {
            $category = Category::findOrFail($category);

            $products = $category->products()
                ->where('is_active', true)
                ->latest()
                ->paginate(12);
        } else {
            $category = null;

            $products = Product::where('is_active', true)
                ->latest()
                ->paginate(12);
        }

        return view('shop.category', compact('category', 'products'));
    }


}
