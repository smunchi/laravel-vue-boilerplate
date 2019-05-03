<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Requests\Backend\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Repository\Products\ProductRepository;

class ProductController extends Controller
{
    public $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('backend.product');
    }

    public function allProducts()
    {
        return $this->repository->getAll();
    }

    public function toggleActive($productID)
    {
        if ($this->repository->activeToggle($productID)) {
            return response()
                ->json(['message' => 'Product status changed successfully!']);
        }
    }

    public function store(ProductRequest $request)
    {
        if ($product = $this->repository->create($request->all())) {
            return response()->json([
                'message' => 'Product Created successfully',
                'data' => $product
            ]);
        }
    }

    public function update($productID, ProductRequest $request)
    {
        if ($product = $this->repository->update($productID, $request->all())) {
            return response()
                ->json([
                    'message' => 'Product updated successfully',
                    'data' => $product
                ]);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy($productID)
    {
        if ($this->repository->delete($productID)) {
            return response()
                ->json(['message' => 'Product deleted successfully!']);
        }
        return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
