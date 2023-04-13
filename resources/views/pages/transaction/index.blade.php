@extends('layouts.dashboard')
@section('title')
    Transaction
@endsection

@section('content')
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h2>Halaman Transaction</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Cashier Name</th>
                                <th>Total</th>
                                <th>Transaction Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->cashier->name }}</td>
                                    <td>{{ $item->total }} </td>
                                    <td>{{ $item->transaction_date }}</td>
                                    <td colspan="2">
                                        <a class="btn btn-success text-light"
                                            href="{{ route('transaction.show', $item->id) }}">Show Details</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
