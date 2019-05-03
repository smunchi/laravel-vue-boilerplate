<?php

namespace Tests\Service\CallCredit;

use App\Services\CreditProfile\CallCredit;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ObjectFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CallCreditTest extends TestCase
{
    use DatabaseTransactions;
    use ObjectFactory;

    protected function setUp()
    {
        parent::setUp();
    }

    public function testSearchCreditProfile()
    {
        $application = $this->createLoanApplication(['loan_amount' => 100]);
        $this->assertNull($application->customer->creditScore);
        $callCredit = new CallCredit($application, true);
        $score = $callCredit->searchCreditProfile();
        $this->assertIsNumeric($score);
        $this->assertIsNumeric($application->customer->creditScore);
    }

    public function testIsCreditDataExists()
    {
        //Search for credit profile
        $application = $this->createLoanApplication(['loan_amount' => 100]);
        $this->assertNull($application->customer->creditScore);
        $callCredit = new CallCredit($application, true);
        $callCredit->searchCreditProfile();
        $this->assertNotNull($application->customer->creditScore);

        //Search again
        $callCredit = new CallCredit($application, true);
        $this->assertTrue($callCredit->isCreditDataExist());
    }
}
