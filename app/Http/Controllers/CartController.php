<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!session()->has('cart') || count(session('cart', [])) == 0) {
            return view('cart.empty');
        }

        $cart = session()->get('cart', []);
        $total = 0;

        $products = collect($cart)->groupBy('id')->map(function ($items) {
            return [
                'id' => $items->first()['id'],
                'name' => $items->first()['name'],
                'description' => $items->first()['description'],
                'price' => $items->first()['price'],
                'quantity' => $items->sum('quantity'),
                'measure' => $items->first()['measure']
            ];
        })->values()->all();

        foreach ($cart as $product) {
            $total += ($product['price']);
        }

        return view('cart.index', ['products' => $products, 'total' => $total]);
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $cart = session()->get('cart', []);
        $total = 0;
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        
        foreach ($cart as $item) {
            if ($item['id'] == $product->id) {
                $out->writeln($product);
                $total += 1;
            }
        }

        if ($total < $product->stock) {
            $cart[] = $product;
        }

        session()->put('cart', $cart);

        return redirect()->to('/cart');
    }

    public function destroy(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $product) {
            if ($product['id'] == $request->id) {
                unset($cart[$key]);

                break;
            }
        }

        session()->put('cart', $cart);

        return redirect()->to('/cart');
    }

    public function pay()
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $key => $item) {
            $product = Product::find($item['id']);
            $product->stock -= 1;
            $product->save();

            unset($cart[$key]);
        }

        session()->put('cart', $cart);

        return redirect()->to('/cart/success');
    }

    public function success()
    {
        return view('cart.success');
    }
}
