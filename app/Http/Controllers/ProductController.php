<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =product::with('category')->get();
        return view('pages/product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories['categories'] = Category::all();
        return view('pages/product.create', $categories );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message =[
            'required' =>':attribute tidak boleh kosong',
        ];
        $validated = $request->validate([
            'category_id' => 'required|int',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|int',
        ],$message);
         Product::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price'),
            'categories_id'=>$request->input('category_id'),
        ]);

        // $input = $request->all();
        // Product::create($input);
        return redirect('product')->with('flash_message', 'Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::find($id);

        return view('pages/product.edit', $data);
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
        $message =[
            'required' =>':attribute tidak boleh kosong',
        ];
        $validated = $request->validate([
            'categories_id' => 'required|int',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|int',
        ],$message);
        $product = Product::find($id);
        $input = $request->all();
        $product->update($input);
        return redirect('product')->with('flash_message', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('/product');
    }
}
