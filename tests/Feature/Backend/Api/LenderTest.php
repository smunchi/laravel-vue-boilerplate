<?php

namespace Tests\Feature\Backend\Api;

use Illuminate\Http\Response;
use Repository\Users\Lender\LenderRepository;
use Repository\Users\UserRepository;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LenderTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->getJson(route('backend.api.lender.index'));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testShow()
    {
        $user = $this->createUserOfRole('lender');
        $lender = $user->lender;
        $response = $this->as('root')->getJson(route('backend.api.lender.show', [$lender->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testValidationErrorWhileStore()
    {
        $lenderRequest = [];
        $response = $this->as('root')->postJson(route('backend.api.lender.store'), $lenderRequest);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['name', 'email']);
    }

    public function testSuccessfulStore()
    {
        $lenderRequest = [
            'name' => 'Test Lender',
            'email' => $email = 'test_lender' . time() . '@gmail.com',
        ];

        $response = $this->as('root')->post(route('backend.api.lender.store'), $lenderRequest);

        $response->assertOk();

        $user = app(UserRepository::class)->model()::where('email', $email)->first();

        $this->assertNotNull($user);
    }

    public function testValidationErrorWhileUpdate()
    {
        $user = $this->createUserOfRole('lender');
        $lenderRequest = [];
        $response = $this->as('root')->putJson(route('backend.api.lender.update', [$user->lender->id]), $lenderRequest);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['name', 'email', 'user_id']);
    }

    public function testSuccessfulUpdate()
    {
        $user = $this->createUserOfRole('lender');
        $lenderRequest = [
            'name' => $name = 'Updated lender name',
            'email' => $user->email,
            'user_id' => $user->id,
        ];

        $response = $this->as('root')->putJson(route('backend.api.lender.update', [$user->lender->id]), $lenderRequest);

        $response->assertOk();

        $lender = app(LenderRepository::class)->model()::find($user->lender->id);

        $this->assertSame($name, $lender->name);
    }

    public function testDelete()
    {
        $user = $this->createUserOfRole('lender');
        $response = $this->as('root')->deleteJson(route('backend.api.lender.delete', [$user->lender->id]));
        $response->assertOk();
        $lender = app(LenderRepository::class)->model()::find($user->lender->id);
        $this->assertNull($lender);
    }

    public function testToggleStatus()
    {
        $user = $this->createUserOfRole('lender');
        $user->update(['is_active' => 1]);

        $response = $this->as('root')->putJson(route('backend.api.lender.toggle.status', [$user->lender->id]));
        $response->assertOk();
        $this->assertEquals(0, app(UserRepository::class)->model()::find($user->id)->is_active);

        $response = $this->as('root')->putJson(route('backend.api.lender.toggle.status', [$user->lender->id]));
        $response->assertOk();
        $this->assertEquals(1, app(UserRepository::class)->model()::find($user->id)->is_active);
    }
}
