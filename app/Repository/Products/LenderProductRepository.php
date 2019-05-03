<?php


namespace App\Repository\Products;

use App\Models\Products\LenderProduct;
use Repository\Repository;

class LenderProductRepository extends Repository
{
    public function model()
    {
        return LenderProduct::class;
    }

    public function getLenderProducts()
    {
        return $this->model()::ofLender(auth()->user()->lender->id)->with(['product' => function ($product) {
            return $product->with(['buckets' => function ($bucket) {
                return $bucket->parent()->with(['children' => function ($childBucket) {
                    return $childBucket->ofUser(auth()->id());
                }]);
            }]);
        }])->get();
    }
}
