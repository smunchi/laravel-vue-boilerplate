<?php

namespace Tests\Feature\Backend\Api;

use Illuminate\Support\Facades\Hash;
use Repository\Users\Lender\LenderRepository;
use Repository\Users\UserRepository;
use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends BackendTestCase
{
    public function testShow()
    {
        $response = $this->as('root')->getJson(route('backend.api.profile.show'));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testUpdate()
    {
        $user = $this->createUserOfRole('root');
        $request = ['name' => 'Updated root', 'email' => 'updated@gmail.com'];
        $response = $this->as($user)->putJson(route('backend.api.profile.update'), $request);
        $response->assertOk();
        $response->assertJson(['message' => 'User updated successfully']);
        $user = $user->refresh();

        $this->assertEquals('Updated root', $user->name);
        $this->assertEquals('updated@gmail.com', $user->email);
    }

    public function testPasswordUpdate()
    {
        $user = $this->createUserOfRole('root');
        $user->update(['password' => Hash::make('test_password') ]);

        $request = [
          'current' => 'test_password',
          'password' => 'secret1',
          'password_confirmation' => 'secret1',
        ];

        $response = $this->as($user)->putJson(route('backend.api.password.update'), $request);
        $response->assertOk();
        $response->assertJson([
            'message' => 'Password updated successfully',
        ]);
        $user = $user->refresh();
        $this->assertTrue(Hash::check('secret1', $user->password));
    }

    public function testShowLenderProfile()
    {
        $response = $this->as('lender')->getJson(route('backend.api.lender.profile.show'));

        $response->assertOk();
        $response->assertJson([]);
    }

    public function testSuccessfulUpdate()
    {
        $user = $this->createUserOfRole('lender');
        $lenderRequest = [
            'name' => $name = 'Updated lender name',
            'email' => $user->email,
        ];

        $response = $this->as($user)
            ->putJson(route('backend.api.lender.profile.update'), $lenderRequest);

        $response->assertOk();

        $lender = app(LenderRepository::class)->model()::find($user->lender->id);

        $this->assertSame($name, $lender->name);
    }
}
