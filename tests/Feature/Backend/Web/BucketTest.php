<?php

namespace Tests\Feature\Backend\Web;

use App\Models\Buckets\Bucket;
use App\Models\Products\Product;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BucketTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.bucket.index'));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->as('root')->get(route('backend.bucket.create'));
        $response->assertOk();
    }

    public function testShow()
    {
        $bucket = $this->createBucket();
        $response = $this->as('root')->get(route('backend.bucket.show', [$bucket->id]));
        $response->assertOk();
    }

    public function testEdit()
    {
        $bucket = $this->createBucket();
        $this->get(route('backend.bucket.edit', [$bucket->id]))->assertRedirect();
        $response = $this->as('root')->get(route('backend.bucket.edit', [$bucket->id]));
        $response->assertOk();
    }

    private function createBucket()
    {
        $product = factory(Product::class)->create();
        return factory(Bucket::class)->create([
            'product_id' => $product->id,
        ]);
    }
}
