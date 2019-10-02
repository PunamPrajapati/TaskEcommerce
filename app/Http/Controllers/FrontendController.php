<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home()
    {
        $products = Product::latest()->get();
        return view('frontend.home', compact('products'));
    }

    public function shoePage()
    {
        $categoryId = Category::where('title', 'shoes')->get()->pluck('id');
        $productShoes = Product::where('category_id', $categoryId)->latest()->get();
        return view('frontend.shoePage', compact('productShoes'));
    }
    public function clothesPage()
    {
        $categoryId = Category::where('title', 'clothes')->get()->pluck('id');
        $productClothes = Product::where('category_id', $categoryId)->latest()->get();
        return view('frontend.clothesPage', compact('productClothes'));
    }
    public function accessoriesPage()
    {
        $categoryId = Category::where('title', 'accessories')->get()->pluck('id');
        $productAccessories = Product::where('category_id', $categoryId)->latest()->get();
        return view('frontend.accessoriesPage', compact('productAccessories'));
    }
    public function toysPage()
    {
        $categoryId = Category::where('title', 'toys')->get()->pluck('id');
        $productToys = Product::where('category_id', $categoryId)->latest()->get();
        return view('frontend.toysPage', compact('productToys'));
    }
    public function productDetailPage($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.productDetailPage', compact('product'));
    }

    public function cartItem()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->latest()->get();

        return view('frontend.cart', compact('carts'));
    }
}
