<?php

namespace Tests\Feature;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUsersEndpoint()
    {
        $this->post('/users', ["email" => "test@email.com","firstName" =>"tester","lastName"=>"user"]);
        $this->seeStatusCode(200);

        $this->seeJsonEquals(
            ["email" => "test@email.com","firstName" =>"tester","lastName"=>"user"]
        );
    }
}
