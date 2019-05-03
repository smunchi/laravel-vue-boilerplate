<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class LenderProduct extends Model
{
    protected $fillable = ['min_loan', 'max_loan', 'product_id', 'lender_id'];

    public function scopeOfLender(Builder $query, $lenderID)
    {
        return $query->where('lender_id', $lenderID);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Products\Product::class);
    }
}
