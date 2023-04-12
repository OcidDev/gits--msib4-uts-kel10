<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('Category.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_category' => 'required'
        ]);
        $insert = Category::create([
            'nama_category' => $request->nama_category
        ]);

        if ($insert) {
            return redirect(route('kategori.index'))->with('success', 'Berhasil menambah Category');
        }else{
            return redirect(route('kategori.create'))->withErrors('Gagal menambahkan Category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::where(['id' => $id])->first();
        // dd($data);
        return view('Category/edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama_category' => 'required'
        ]);
        $update = Category::where(['id'=> $id])->update([
            'nama_category' => $request->nama_category
        ]);
        if ($update) {
            return redirect(route('kategori.index'))->with('success', 'Berhasil edit Category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $delete = Category::find($id)->delete();
        return redirect(route('kategori.index'))->with('success', 'Berhasil menghapus Category');
    }
}