<?php

namespace Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use SaralSMS\Client;
use SaralSMS\Exception\SaralSMSException;

class ParentTestCase extends TestCase
{
    /**
     * @var Factory $faker
     */
    protected $faker;

    /**
     * @var Client $client
     */
    protected Client $client;

    /**
     * @throws SaralSMSException
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (getenv('SARALSMS_API_TOKEN')) {
            $token = getenv('SARALSMS_API_TOKEN');
        } else {
            $token = $_SERVER['SARALSMS_API_TOKEN'];
        }

        // init the client
        $this->client = new Client([
            'token' => $token,
            'is_sandbox' => true,
        ]);

        // init faker
        $this->faker = Factory::create();
    }
}
