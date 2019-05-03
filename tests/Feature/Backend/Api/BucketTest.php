<?php

namespace Tests\Feature\Backend\Api;

use App\Models\Buckets\Bucket;
use App\Models\Products\Product;
use Illuminate\Http\Response;
use Repository\Buckets\BucketRepository;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BucketTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->getJson(route('backend.api.bucket.index'));

        $response->assertOk();
        $response->assertJson([]);
    }

    public function testValidationErrorWhileStore()
    {
        $bucketRequest = [
            'rules' => 'should be an array',
        ];

        $response = $this->as('root')->postJson(route('backend.api.bucket.store'), $bucketRequest);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonValidationErrors(['name', 'product_id', 'min_score', 'max_score', 'rules']);
    }

    public function testSuccessfulStore()
    {
        $product = factory(Product::class)->create();

        $bucketRequest = [
            'name' => 'Test bucket',
            'product_id' => $product->id,
            'min_score' => 500,
            'max_score' => 600,
            'rules' => [[]]
        ];

        $response = $this->as('root')->postJson(route('backend.api.bucket.store'), $bucketRequest);

        $response->assertOk();

        $bucket = app(BucketRepository::class)->model()::where('name', 'Test bucket')
            ->where('product_id', $product->id)
            ->first();

        $this->assertNotNull($bucket);
    }

    public function testShow()
    {
        $product = factory(Product::class)->create();
        $bucket = factory(Bucket::class)->create(['product_id' => $product->id]);

        $response = $this->as('root')->getJson(route('backend.api.bucket.show', [$bucket->id]));

        $response->assertOk();
    }

    public function testValidationErrorWhileUpdate()
    {
        $product = factory(Product::class)->create();
        $bucket = factory(Bucket::class)->create(['product_id' => $product->id]);
        $bucketRequest = [
            'rules' => 'rules should be an array'
        ];

        $response = $this->as('root')
            ->putJson(route('backend.api.bucket.update', [$bucket->id]), $bucketRequest);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonValidationErrors(['name', 'product_id', 'min_score', 'max_score', 'rules']);
    }

    public function testSuccessfulUpdate()
    {
        $product = factory(Product::class)->create();
        $bucket = factory(Bucket::class)->create(['product_id' => $product->id]);
        $bucketRequest = [
            'name' => 'Updated name',
            'product_id' => $product->id,
            'min_score' => 500,
            'max_score' => 600,
            'rules' => [[]],
        ];

        $response = $this->as('root')
            ->putJson(route('backend.api.bucket.update', [$bucket->id]), $bucketRequest);

        $response->assertOk();

        $bucket = $bucket->refresh();

        $this->assertSame('Updated name', $bucket->name);
    }

    public function testDelete()
    {
        $product = factory(Product::class)->create();
        $bucket = factory(Bucket::class)->create(['product_id' => $product->id]);

        $response = $this->as('root')->deleteJson(route('backend.api.bucket.delete', [$bucket->id]));
        $response->assertOk();

        $bucket = app(BucketRepository::class)->model()::find($bucket->id);
        $this->assertNull($bucket);
    }

    public function testColor()
    {
        $response = $this->as('root')->get(route('backend.api.bucket.color'));
        $response->assertOk();
        $response->assertJson([]);
    }
}
