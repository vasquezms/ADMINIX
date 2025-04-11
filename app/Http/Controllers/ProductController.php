<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'price' => $this->parseColombianPrice($request->input('price'))
        ]);

        $validator = Validator::make($request->all(), [
            'product' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->merge([
            'price' => $this->parseColombianPrice($request->input('price'))
        ]);

        $validator = Validator::make($request->all(), [
            'product' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    private function parseColombianPrice($price)
    {
        if (is_string($price)) {
            $price = preg_replace('/\.(?=\d{3}(?:,|$))/', '', $price);
            $price = str_replace(',', '.', $price);
        }

        return is_numeric($price) ? (float)$price : 0;
    }
}
