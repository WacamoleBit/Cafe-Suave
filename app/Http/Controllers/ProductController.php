<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'measure' => 'required|string',
            'stock' => 'required|numeric'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->measure = $request->measure;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->to('/products')->with("Success", "Producto registrado con éxito");
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'measure' => 'required|string',
            'quantity' => 'required|numeric'
        ]);
        

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->measure = $request->measure;
        $product->stock = $request->stock;

        $product->save();

        return redirect()->to('/products')->with('Success', 'Producto actualizado con éxito');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        return view('product.destroy', ['product' => $product]);
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::find($id);
        
        if ($request->submitbutton == 'confirm') {
            $product->delete();

            return redirect()->to('/products')->with('Success', 'Producto eliminado del inventario con éxito');
        }
        
        return redirect()->to('/products');
    }
}
