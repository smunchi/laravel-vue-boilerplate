<?php

namespace Tests\Feature\Backend\Api;

use App\Models\Products\Product;
use Illuminate\Http\Response;
use Repository\Products\ProductRepository;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.api.product.index'));
        $response->assertJson([]);
        $response->assertOk();
    }

    public function testValidationErrorWhileProductStore()
    {
        $productRequest = [];

        $response = $this->as('root')->postJson(route('backend.api.product.store'), $productRequest);

        $response->assertJsonValidationErrors(['name', 'min_month']);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testSuccessfulStore()
    {
        $productRequest = [
            'name' => 'Test Product',
            'min_month' => 1,
            'max_month' => 12,
        ];

        $response = $this->as('root')->postJson(route('backend.api.product.store'), $productRequest);

        $response->assertOk();
        $productRepo = app(ProductRepository::class);
        $this->assertNotNull($productRepo->model()::where('name', 'Test Product')->first());
    }

    public function testValidationErrorWhileUpdate()
    {
        $product = factory(Product::class)->create();

        $productRequest = [];

        $response = $this->as('root')
            ->putJson(route('backend.api.product.update', [$product->id]), $productRequest);

        $response->assertJsonValidationErrors(['name', 'min_month']);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function testSuccessfulUpdate()
    {
        $product = factory(Product::class)->create();

        $productRequest = [
            'name' => 'Updated name',
            'min_month' => $product->min_month,
            'max_month' => $product->max_month,
        ];

        $response = $this->as('root')
            ->putJson(route('backend.api.product.update', [$product->id]), $productRequest);

        $response->assertOk();

        $product = $product->refresh();

        $this->assertSame('Updated name', $product->name);
    }

    public function testDelete()
    {
        $product = factory(Product::class)->create();

        $this->as('root')->deleteJson(route('backend.api.product.delete', [$product->id]));

        $product = app(ProductRepository::class)->find($product->id);
        $this->assertNull($product);
    }

    public function testToggleActive()
    {
        $product = factory(Product::class)->create(['is_active' => 1]);

        //Deactivate
        $this->as('root')->putJson(route('backend.api.product.active.toggle', [$product->id]));

        $product->refresh();

        $this->assertEquals(0, $product->is_active);

        //Activate
        $this->as('root')->putJson(route('backend.api.product.active.toggle', [$product->id]));

        $product->refresh();

        $this->assertEquals(1, $product->is_active);
    }
}
