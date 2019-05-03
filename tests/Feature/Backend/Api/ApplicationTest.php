<?php

namespace Tests\Feature\Backend\Api;

use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationTest extends BackendTestCase
{
    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.api.application.index'));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testShow()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.api.application.show', [$application->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testCallCredit()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.api.application.call_credit.show', [$application->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testAddress()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.api.application.address', [$application->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testBank()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.api.application.banks', [$application->id]));
        $response->assertOk();
        $response->assertJson([]);
    }

    public function testEmployment()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.api.application.employments', [$application->id]));
        $response->assertOk();
        $response->assertJson([]);
    }
}
