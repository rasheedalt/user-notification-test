<?php

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
        $this->get('/users', ["email" => "test@email.com","firstName" =>"tester","lastName"=>"user"]);
        $this->seeStatusCode(200);

        $this->seeJsonStructure(
            ["email" => "test@email.com","firstName" =>"tester","lastName"=>"user"]
        );
    }
}
