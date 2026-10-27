<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'thumb_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'large_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['nullable', 'integer', 'min:0'],
        ]);

        $product = Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'discount_price' => $validated['discount_price'] ?? null,
            'stock' => $validated['stock'] ?? 0,
            'featured' => $request->boolean('featured'),
            'is_active' => $request->boolean('is_active'),
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        if ($request->hasFile('thumb_image')) {
            $product->thumb_image = $request->file('thumb_image')->store('products', 'public');
        }

        if ($request->hasFile('large_image')) {
            $product->large_image = $request->file('large_image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'thumb_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'large_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['nullable', 'integer', 'min:0'],
        ]);

        $product->category_id = $validated['category_id'];
        $product->name = $validated['name'];
        $product->description = $validated['description'] ?? null;
        $product->price = $validated['price'];
        $product->discount_price = $validated['discount_price'] ?? null;
        $product->stock = $validated['stock'] ?? 0;
        $product->featured = $request->boolean('featured');
        $product->is_active = $request->boolean('is_active');
        $product->updated_by = Auth::id();

        if ($request->hasFile('thumb_image')) {
            if ($product->thumb_image && Storage::disk('public')->exists($product->thumb_image)) {
                Storage::disk('public')->delete($product->thumb_image);
            }
            $product->thumb_image = $request->file('thumb_image')->store('products', 'public');
        }

        if ($request->hasFile('large_image')) {
            if ($product->large_image && Storage::disk('public')->exists($product->large_image)) {
                Storage::disk('public')->delete($product->large_image);
            }
            $product->large_image = $request->file('large_image')->store('products', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->thumb_image && Storage::disk('public')->exists($product->thumb_image)) {
            Storage::disk('public')->delete($product->thumb_image);
        }

        if ($product->large_image && Storage::disk('public')->exists($product->large_image)) {
            Storage::disk('public')->delete($product->large_image);
        }

        $product->deleted_by = Auth::id();
        $product->save();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function show(Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }

        $product->load('category');

        return view('products.show', compact('product'));
    }


     public function listing(Request $request)
    {
        $query = Product::where('is_active', true)
            ->with('category');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('category', function ($categoryQuery) use ($search) {
                    $categoryQuery->where('name', 'like', '%' . $search . '%');
                });
            });
        }

        $products = $query
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('products.listing', compact('products'));
    }
    public function category(Category $category)
    {
        $products = Product::where('is_active', true)
            ->where('category_id', $category->id)
            ->with('category')
            ->latest()
            ->paginate(12);

        return view('products.listing', compact(
            'products',
            'category'
        ));
    }


}
