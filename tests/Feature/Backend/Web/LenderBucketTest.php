<?php

namespace Tests\Feature\Backend\Web;

use App\Models\Buckets\Bucket;
use App\Models\Products\Product;
use Tests\Feature\Backend\BackendTestCase;
use Tests\ObjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LenderBucketTest extends BackendTestCase
{
    use ObjectFactory;

    public function testIndex()
    {
        $response = $this->as('lender')->get(route('backend.lender.bucket.index'));

        $response->assertOk();
    }

    public function testShow()
    {
        $bucket = $this->createBucket();
        $response = $this->as('lender')->get(route('backend.lender.bucket.show', [$bucket->id]));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->as('lender')->get(route('backend.lender.bucket.index'));

        $response->assertOk();
    }

    public function testEdit()
    {
        $bucket = $this->createBucket();
        $response = $this->as('lender')->get(route('backend.lender.bucket.edit', [$bucket->id]));
        $response->assertOk();
    }

    private function createBucket()
    {
        $user = $this->createUserOfRole('lender');
        $product = factory(Product::class)->create();
        return factory(Bucket::class)->create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
    }
}
