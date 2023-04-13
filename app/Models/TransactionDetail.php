<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['transactions_id','products_id','qty'];

    /**
     * Get the user that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    /**
     * Get the transactions that owns the TransactionDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transactions(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

}
