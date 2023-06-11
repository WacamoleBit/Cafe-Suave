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
        $search = Product::find($request->id);

        $cart = session()->get('cart', []);

        $inCart = collect($cart)->firstWhere('id', $search->id);

        if ($inCart) {
            $inCart['quantity']; //???
        } else {
            $inCart = [
                'id' => $search->id,
                'name' => $search->name,
                'description' => $search->description,
                'price' => $search->price,
                'quantity' => $search->quantity,
                'measure' => $search->measure,
            ];
        }
        $cart[] = $inCart; //???

        session()->put('cart', $cart);

        return redirect()->to('/cart');
    }

    public function destroy(Request $request)
    {
        $productBase = Product::find($request->id);

        $cart = session()->get('cart', []);

        foreach ($cart as $key => $product) {
            if ($product['id'] == $request->id) {
                $cart[$key]['quantity'] -= $productBase->quantity;

                if ($cart[$key]['quantity'] < 1) {
                    unset($cart[$key]);
                }

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
