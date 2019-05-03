<?php
namespace Repository\Products;

use App\Models\Products\Product;
use Repository\Repository;

class ProductRepository extends Repository
{
    /**
     * Define model class
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    /**
     * Toggle product activation status
     *
     * @param integer $productID
     * @return boolean
     */
    public function activeToggle($productID)
    {
        $product = $this->findOrFail($productID);
        return $product->update(['is_active' => !$product->is_active]);
    }
}
