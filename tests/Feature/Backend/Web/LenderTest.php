<?php

namespace Tests\Feature\Backend\Web;

use Tests\Feature\Backend\BackendTestCase;
use Tests\ObjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LenderTest extends BackendTestCase
{
    use ObjectFactory;

    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.lender.index'));
        $response->assertOk();
    }

    public function testShow()
    {
        $lender = $this->createUserOfRole('lender');
        $response = $this->as('root')->get(route('backend.lender.show', [$lender->id]));
        $response->assertOk();
    }

    public function testCreate()
    {
        $response = $this->as('root')->get(route('backend.lender.create'));
        $response->assertOk();
    }

    public function testEdit()
    {
        $lender = $this->createUserOfRole('lender');
        $response = $this->as('root')->get(route('backend.lender.edit', [$lender->id]));
        $response->assertOk();
    }
}
