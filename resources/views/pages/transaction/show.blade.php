@extends('layouts.dashboard')
@section('title')
    Transaction Detail
@endsection

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card shadow mt-4">
                <div class="card-header py-3 text-center">
                    <h2>Invoice | #{{ $transaction->invoice }}</h2>
                    <h5>Date | {{ $transaction->transaction_date }}</h5>
                    <h5>Cashier | {{ $transaction->cashier->name }}</h5>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive mt-3">
                            <table class="table font-weight">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction->transaction_details as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->products->name }}</td>
                                            <td>Rp {{ number_format($item->products->price) }} </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp {{ number_format($item->products->price*$item->qty) }} </td>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end">Total</td>
                                        <td>Rp {{ number_format($transaction->total) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
