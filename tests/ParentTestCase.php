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
    protected static $faker;

    /**
     * @var Client $client
     */
    protected $client;

    /**
     * @var string $authToken
     */
    protected static $authToken;

    /**
     * @var bool $isFireUp
     */
    private static $isFireUp = false;

    protected function setUp(): void
    {
        parent::setUp();

        if (!self::$isFireUp) {
            // init faker
            self::$faker = Factory::create();

            // set auth token
            self::$authToken = $_ENV['SARALSMS_AUTH_TOKEN'];

            self::$isFireUp = true;
        }

        // init saralsms client
        $this->client = new Client(self::$authToken);
    }
}
