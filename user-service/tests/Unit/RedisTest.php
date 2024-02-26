<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Redis;


class RedisTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedisConnectionWorks()
    {
        Redis::set('greetings', 'Hello!');

        $this->assertEquals('Hello!', Redis::get('greetings'));
    }
}
