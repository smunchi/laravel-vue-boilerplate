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

class LenderBucketTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('lender')->getJson(route('backend.api.lender.bucket.index'));

        $response->assertOk();
        $response->assertJson([]);
    }

    public function testValidationErrorWhileStore()
    {
        $bucket = $this->getParentBucket();
        $bucketRequest = [
            'rules' => 'should be an array',
        ];

        $response = $this->as('lender')
            ->postJson(route('backend.api.lender.bucket.store', [$bucket->id]), $bucketRequest);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonValidationErrors(['name', 'product_id', 'min_score', 'max_score', 'rules']);
    }

    public function testSuccessfulStore()
    {
        $bucket = $this->getParentBucket();

        $bucketRequest = [
            'name' => 'Test bucket',
            'product_id' => $bucket->product_id,
            'parent_id' => $bucket->id,
            'min_score' => 500,
            'max_score' => 600,
            'rules' => [[]]
        ];

        $response = $this->as('root')
            ->postJson(route('backend.api.lender.bucket.store', [$bucket->id]), $bucketRequest);

        $response->assertOk();

        $bucket = app(BucketRepository::class)->model()::where('name', 'Test bucket')
            ->where('product_id', $bucket->product_id)
            ->first();

        $this->assertNotNull($bucket);
    }

    public function testShow()
    {
        $user = $this->createUserOfRole('lender');
        $product = factory(Product::class)->create();
        $bucket = factory(Bucket::class)->create(['product_id' => $product->id]);

        $response = $this->as($user)->getJson(route('backend.api.bucket.show', [$bucket->id]));

        $response->assertOk();
    }

    public function testValidationErrorWhileUpdate()
    {
        $user = $this->createUserOfRole('lender');
        $parentBucket = $this->getParentBucket();
        $bucket = factory(Bucket::class)->create(['product_id' => $parentBucket->product_id]);
        $bucketRequest = [
            'rules' => 'rules should be an array'
        ];

        $response = $this->as($user)
            ->putJson(route('backend.api.lender.bucket.update', [$bucket->id]), $bucketRequest);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $response->assertJsonValidationErrors(['name', 'product_id', 'min_score', 'max_score', 'rules']);
    }

    public function testSuccessfulUpdate()
    {
        $user = $this->createUserOfRole('lender');
        $parentBucket = $this->getParentBucket();
        $bucket = factory(Bucket::class)->create(['product_id' => $parentBucket->product_id]);
        $bucketRequest = [
            'name' => 'Updated name',
            'product_id' => $bucket->product_id,
            'user_id' => $user->id,
            'min_score' => 500,
            'max_score' => 600,
            'rules' => [[]],
        ];

        $response = $this->as($user)
            ->putJson(route('backend.api.lender.bucket.update', [$bucket->id]), $bucketRequest);

        $response->assertOk();

        $bucket = $bucket->refresh();

        $this->assertSame('Updated name', $bucket->name);
    }

    public function testDelete()
    {
        $parentBucket = $this->getParentBucket();
        $user = $this->createUserOfRole('lender');

        $bucket = factory(Bucket::class)->create([
            'product_id' => $parentBucket->product_id,
            'parent_id' => $parentBucket->id,
            'user_id' => $user->id,
        ]);

        $response = $this->as($user)->deleteJson(route('backend.api.lender.bucket.delete', [$bucket->id]));
        $response->assertOk();

        $bucket = app(BucketRepository::class)->model()::find($bucket->id);
        $this->assertNull($bucket);
    }

    private function getParentBucket()
    {
        $product = factory(Product::class)->create();
        return factory(Bucket::class)->create(['product_id' => $product->id]);
    }
}
