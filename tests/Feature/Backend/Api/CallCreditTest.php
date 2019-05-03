<?php

namespace Tests\Feature\Backend\Api;

use Tests\Feature\Backend\BackendTestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CallCreditTest extends BackendTestCase
{
    public function testApiFieldList()
    {
        $response = $this->as('root')->get(route('backend.api.call_credit.api_field.index'));
        $response->assertOk();
        $response->assertJson([]);
    }
}
