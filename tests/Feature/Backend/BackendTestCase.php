<?php


namespace Tests\Feature\Backend;

use App\Models\Users\Customer;
use App\Models\Users\Lender;
use App\Models\Users\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\ObjectFactory;
use Tests\TestCase;

abstract class BackendTestCase extends TestCase
{
    use DatabaseTransactions, ObjectFactory;

    public function as($roleOrUser = 'root')
    {
        if (is_string($roleOrUser)) {
            $user = $this->createUserOfRole($roleOrUser);
        } elseif ($roleOrUser instanceof User) {
            $user = $roleOrUser;
        }
        auth()->login($user);
        return $this;
    }
}
