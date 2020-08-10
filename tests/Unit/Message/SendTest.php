<?php

namespace Tests\Unit\Message;

use Tests\ParentTestCase;

class SendTest extends ParentTestCase
{
    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_ntc(): void
    {
        $numbers = [$_ENV['TEST_MOBILE_NTC']];
        $response = $this->client->send($numbers, self::$faker->sentence);
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_ncell(): void
    {
        $numbers = [$_ENV['TEST_MOBILE_NCELL']];
        $response = $this->client->send($numbers, self::$faker->sentence);
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_smartcell(): void
    {
        $numbers = [$_ENV['TEST_MOBILE_SMARTCELL']];
        $response = $this->client->send($numbers, self::$faker->sentence);
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_multiple_numbers(): void
    {
        $numbers = [$_ENV['TEST_MOBILE_NTC'], $_ENV['TEST_MOBILE_NCELL'], $_ENV['TEST_MOBILE_SMARTCELL']];
        $response = $this->client->send($numbers, self::$faker->sentence);
        self::assertIsObject($response);
    }
}
