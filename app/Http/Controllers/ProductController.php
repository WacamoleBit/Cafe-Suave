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
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->name);
        $out->writeln($request->price);
        $out->writeln($request->quantity);
        $out->writeln($request->measure);
        $out->writeln($request->description);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'measure' => 'required|string'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->measure = $request->measure;

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

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln($request->description);
        
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'measure' => 'required|string'
        ]);
        

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->measure = $request->measure;

        $product->save();

        return redirect()->to('/products');
    }
}
