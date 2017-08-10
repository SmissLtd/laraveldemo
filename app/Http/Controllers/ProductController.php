<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Brand;
use App\Tag;
use App\Order;
use App\OrderProduct;

class ProductController extends Controller
{
    public function category(Category $category)
    {
        $products = $category->exists ? $category->products : Product::all();
        $title = $category->exists ? $category->name : 'Products';
        $categories = Category::where('is_special', false)->take(5)->get();
        $bestsellers = $category->exists ? $category->products()->orderBy('sold', 'desc')->take(4)->get() : Product::orderBy('sold', 'desc')->take(4)->get();
        return view('products.category', [
            'tags' => $category->tags,
            'products' => $products,
            'title' => $title,
            'categories' => $categories,
            'bestsellers' => $bestsellers
        ]);
    }
    
    public function brand(Brand $brand)
    {
        $products = $brand->products;
        $title = $brand->name;
        $categories = Category::where('is_special', false)->take(5)->get();
        $bestsellers = $brand->products()->orderBy('sold', 'desc')->take(4)->get();
        return view('products.category', [
            'tags' => $category->tags,
            'products' => $products,
            'title' => $title,
            'categories' => $categories,
            'bestsellers' => $bestsellers
        ]);
    }
    
    public function tag(Tag $tag)
    {
        $products = $tag->products;
        $title = $tag->name;
        $categories = Category::where('is_special', false)->take(5)->get();
        $bestsellers = $tag->products()->orderBy('sold', 'desc')->take(4)->get();
        return view('products.category', [
            'tags' => [],
            'products' => $products,
            'title' => $title,
            'categories' => $categories,
            'bestsellers' => $bestsellers
        ]);
    }
    
    public function product(Product $product)
    {
        $categories = Category::where('is_special', false)->take(5)->get();
        $bestsellers = Product::orderBy('sold', 'desc')->take(4)->get();
        $products = $product->categories()->inRandomOrder()->first()->products()->where('products.id', '<>', $product->id)->take(3)->get();
        return view('products.product', [
            'product' => $product,
            'categories' => $categories,
            'bestsellers' => $bestsellers,
            'tags' => $product->tags,
            'products' => $products
        ]);
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        $products = Product::where('name', 'LIKE', "%$search%")->orWhere('name_long', 'LIKE', "%$search%")->get();
        $title = $search;
        $categories = Category::where('is_special', false)->take(5)->get();
        $bestsellers = Product::orderBy('sold', 'desc')->take(4)->get();
        return view('products.category', [
            'tags' => [],
            'products' => $products,
            'title' => $title,
            'categories' => $categories,
            'bestsellers' => $bestsellers
        ]);
    }
    
    public function addToCart(Request $request)
    {
        $cart = session('cart', []);
        $product = Product::find($request->input('id'));
        if (empty($cart['total']))
            $cart['total'] = 0;
        if (empty($cart['products'][$product->id]))
            $cart['products'][$product->id] = ['price' => $product->price, 'count' => 1];
        else
            $cart['products'][$product->id]['count']++;
        $cart['total'] += $product->price;
        session(['cart' => $cart]);
        return $cart['total'];
    }
    
    public function emptyCart()
    {
        session(['cart' => ['total' => 0]]);
    }
    
    public function checkout()
    {
        $cart = session('cart', []);
        if (!empty($cart['products']))
            foreach ($cart['products'] as $id => $value)
                $cart['products'][$id]['product'] = Product::find($id);
        return view('products.checkout', ['cart' => $cart]);
    }
    
    public function buy(Request $request)
    {
        $cart = session('cart', []);
        $products = [];
        $cart['total'] = $cart['count'] = 0;
        if (!empty($cart['products']))
            foreach ($cart['products'] as $id => $data)
            {
                $count = intval($request->input('product.' . $id, $data['count']));
                if ($count <= 0)
                    unset($cart['products'][$id]);
                $cart['products'][$id]['count'] = $count;
                $cart['count'] += $count;
                $cart['total'] += $data['price'] * $count;
            }
        session(['cart' => $cart]);
        return view('products.buy', ['cart' => $cart]);
    }
    
    public function buy2(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart['products']))
            return redirect()->action('ProductController@cart');
        $request->flash();
        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|max:255',
            'message' => 'nullable'
        ]);
        $order = new Order();
        if (Auth::check())
            $order->user_id = Auth::user()->id;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->message = $request->input('message', null);
        $order->save();
        foreach ($cart['products'] as $id => $data)
            if ($model = Product::find($id))
            {
                $model->sold += $data['count'];
                $model->save();
                $product = new OrderProduct();
                $product->order_id = $order->id;
                $product->product_id = $id;
                $product->count = $data['count'];
                $product->price = $data['price'];
                $product->save();
            }
        session(['cart' => ['total' => 0]]);
        return view('products.bought');
    }
}