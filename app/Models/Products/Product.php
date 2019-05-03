<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'min_month', 'max_month', 'is_active', 'description'];
    protected $appends = ['month_range'];

    public function getMonthRangeAttribute()
    {
        return "{$this->min_month} to {$this->max_month} months";
    }

    /** lender relation */
    public function lenders()
    {
        return $this->belongsToMany(
            \App\Models\Users\Lender::class,
            (new \App\Models\Products\LenderProduct())->getTable()
            )->withTimestamps();
    }

    /** Bucket list of related product */
    public function buckets()
    {
        return $this->hasMany(\App\Models\Buckets\Bucket::class);
    }

    public function parentBuckets()
    {
        return $this->buckets()->parent();
    }
}
