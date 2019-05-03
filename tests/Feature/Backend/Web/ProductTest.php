<?php

namespace Tests\Feature\Backend\Web;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.product.index'));

        $response->assertOk();
    }
}
