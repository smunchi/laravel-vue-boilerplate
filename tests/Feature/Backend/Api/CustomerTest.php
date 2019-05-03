<?php

namespace Tests\Feature\Backend\Api;

use Repository\Users\Customer\CustomerRepository;
use Repository\Users\UserRepository;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->getJson(route('backend.api.customer.index'));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testShow()
    {
        $user = $this->createUserOfRole('customer');
        $response = $this->as('root')->getJson(route('backend.api.customer.show', [$user->customer->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testDelete()
    {
        $user = $this->createUserOfRole('customer');
        $response = $this->as('root')->deleteJson(route('backend.api.customer.delete', [$user->customer->id]));
        $response->assertOk();

        $user = app(UserRepository::class)->find($user->id);

        $this->assertNull($user);
    }

    public function testToggleStatus()
    {
        $user = $this->createUserOfRole('customer');
        $user->update(['is_active' => 1]);

        $response = $this->as('root')->putJson(route('backend.api.customer.toggle.status', [$user->customer->id]));

        $response->assertOk();
        $this->assertEquals(0, app(UserRepository::class)->find($user->id)->is_active);

        $response = $this->as('root')->putJson(route('backend.api.customer.toggle.status', [$user->customer->id]));

        $response->assertOk();
        $this->assertEquals(1, app(UserRepository::class)->find($user->id)->is_active);
    }
}
