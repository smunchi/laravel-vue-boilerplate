<?php

namespace Tests\Feature\Backend\Web;

use Tests\Feature\Backend\BackendTestCase;
use Tests\ObjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends BackendTestCase
{
    use ObjectFactory;

    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.customer.index'));
        $response->assertOk();
    }

    public function testShow()
    {
        $customer = $this->createUserOfRole('customer');
        $response = $this->as('root')->get(route('backend.customer.show', [$customer->id]));
        $response->assertOk();
    }
}
