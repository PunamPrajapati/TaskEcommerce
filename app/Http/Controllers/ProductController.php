<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Division;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get()->all();
        return view('backend/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get()->pluck('title', 'id');
        $divisions = Division::latest()->get()->pluck('name', 'id');
        return view('backend.product.create', compact('categories', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'division_id' => 'required',
            'price' => 'required',
            'available' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if ($validation->fails()) {
            return [
                'status' => 'fails',
                'errors' => $validation->getMessageBag()->toArray()
            ];
        }
        $input = $request->all();

        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('productImage', $name);
            $input['image'] = $name;
        }

        Product::create($input);
        return [
            'status' => 'success',
            'message' => 'product created successfully',
            'data-url' => url('products')
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get()->pluck('title', 'id');
        $divisions = Division::latest()->get()->pluck('name', 'id');
        return view('backend.product.edit', compact('product', 'categories', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'available' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if ($validation->fails()) {
            return [
                'status' => 'fails',
                'errors' => $validation->getMessageBag()->toArray()
            ];
        }
        $input = $request->all();
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();
            $file->move('productImage', $name);
            $input['image'] = $name;
        }

        $product->update($input);
        return [
            'status' => 'success',
            'message' => 'product updated successfully',
            'data-url' => url('products')
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path() . "/productImage/" . $product->image);
        $product->delete();
        return [
            'status' => 'success',
            'message' => 'product deleted successfully',
            'data-url' => url('products')
        ];
    }
}
