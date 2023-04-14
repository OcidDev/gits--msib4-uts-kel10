<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $carts = Cart::with('products')->get();
        $total = Cart::join('products', 'carts.products_id', '=', 'products.id')
            ->sum(DB::raw('carts.qty * products.price'));
        return view('pages.cart.index',compact('products','carts','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => 'Atribut tidak boleh kosong'
        ];
        $validated = $request->validate([
            'products_id'   => 'required',
            'qty'           => 'required|numeric|min:1'
        ],$message);
        $cek = Cart::where('products_id',$request->products_id)->first();
        if($cek){
            Cart::where('id',$cek->id)->update(['qty'=>$cek->qty + $request->qty]);
        }else{
            Cart::create($validated);
        }
        return redirect('cart');
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
        //
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
        $cart = Cart::findOrFail($id);
        $cart -> update([
            'qty' => $request-> qty,
        ]);
        return redirect('cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Cart::find($id);
        $deleted->delete();
        return back();
    }

    public function checkout()
    {
        $cashier = Auth::user()->id;
        // Ambil data dari table cart
        $carts = Cart::all();
        // dd('cart');
        $total = Cart::join('products', 'carts.products_id', '=', 'products.id')->sum(DB::raw('carts.qty * products.price'));
        //insert table tansaksi
        $transaction = new Transaction;
        $transaction->invoice = rand(1000, 9999); // Generate random invoice number
        $transaction->users_id = auth()->user()->id; // Get authenticated user's ID
        $transaction->total = $total; // Set total amount from previous calculation
        $transaction->transaction_date = date('Y-m-d');
        $transaction->save();

        foreach($carts as $cart) {
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->products_id,
                'qty' => $cart->qty,
            ]);

            // Delete the cart item
            $cart->delete();
        //insert data ke tabel detail transaksi
        }
        return redirect()->route('transaction.show', $transaction->id);
    }
}
