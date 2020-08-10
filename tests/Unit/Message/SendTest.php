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
        $numbers = [$_ENV['SARALSMS_MOBILE_NTC']];
        $this->client->send($numbers, self::$faker->sentence);
    }

    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_ncell(): void
    {
        $numbers = [$_ENV['SARALSMS_MOBILE_NCELL']];
        $this->client->send($numbers, self::$faker->sentence);
    }

    /**
     * @covers \SaralSMS\Message\Message::send
     */
    public function test_can_send_message_to_smartcell(): void
    {
        $numbers = [$_ENV['SARALSMS_MOBILE_SMARTCELL']];
        $this->client->send($numbers, self::$faker->sentence);
    }
}
