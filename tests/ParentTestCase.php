<?php

namespace Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use SaralSMS\Client;

class ParentTestCase extends TestCase
{
    /**
     * @var Factory $faker
     */
    protected $faker;

    /**
     * @var Client $client
     */
    protected $client;

    /**
     * @var bool $isFireUp
     */
    private static $isFireUp = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (!self::$isFireUp) {
            // init faker
            $this->faker = Factory::create();
            self::$isFireUp = true;
        }
        // init saralsms client
        $this->client = new Client('');
    }
}
