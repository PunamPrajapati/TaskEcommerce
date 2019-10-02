<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Product;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        $customers = User::where('role', 'customer')->get();
        $categories = Category::all();

        return view('backend.dashboard', compact('products', 'customers', 'categories'));
    }
}
