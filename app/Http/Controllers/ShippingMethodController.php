<?php

namespace App\Http\Controllers;

use App\Models\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $shippingMethods = ShippingMethod::latest('id')
            ->paginate(15);

        return view('shipping-methods.index', compact('shippingMethods'));
    }

    public function create()
    {
        return view('shipping-methods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'estimated_days' => ['required', 'integer', 'min:1'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        ShippingMethod::create($validated);

        return redirect()
            ->route('shipping-methods.index')
            ->with('success', 'Shipping method created successfully.');
    }

    public function edit(ShippingMethod $shippingMethod)
    {
        return view('shipping-methods.edit', compact('shippingMethod'));
    }

    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'estimated_days' => ['required', 'integer', 'min:1'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $shippingMethod->update($validated);

        return redirect()
            ->route('shipping-methods.index')
            ->with('success', 'Shipping method updated successfully.');
    }

    public function destroy(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete();

        return redirect()
            ->route('shipping-methods.index')
            ->with('success', 'Shipping method deleted successfully.');
    }
}
