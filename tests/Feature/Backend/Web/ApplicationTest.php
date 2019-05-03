<?php

namespace Tests\Feature\Backend\Web;

use Tests\Feature\Backend\BackendTestCase;
use Tests\ObjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplicationTest extends BackendTestCase
{
    use ObjectFactory;
    public function testIndex()
    {
        $response = $this->as('root')->get(route('backend.application.index'));
        $response->assertOk();
    }

    public function testShow()
    {
        $application = $this->createLoanApplication();
        $response = $this->as('root')->get(route('backend.application.show', [$application->id]));
        $response->assertOk();
    }
}
