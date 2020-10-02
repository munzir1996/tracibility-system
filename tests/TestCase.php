<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginUser($user = null){

        $user = $user ? $user : factory(User::class)->create();

        $this->actingAs($user);

        return $user;
    }

}


