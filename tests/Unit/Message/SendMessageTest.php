<?php

namespace Tests\Unit\Message;

use Error;
use SaralSMS\Exception\SaralSMSException;
use Tests\ParentTestCase;

class SendMessageTest extends ParentTestCase
{
    public function test_without_parameters()
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessageMatches('/few arguments to function/');
        $this->client->message->sendMessage();
    }

    public function test_with_empty_parameters()
    {
        $this->expectException(SaralSMSException::class);
        $this->expectExceptionMessageMatches('/The number param is required./');
        $this->client->message->sendMessage('', '');
    }

    public function test_with_number_only()
    {
        $this->expectException(SaralSMSException::class);
        $this->expectExceptionMessageMatches('/The message param is required./');
        $this->client->message->sendMessage(1234567890, '');
    }

    public function test_with_invalid_number()
    {
        $result = $this->client->message->sendMessage($this->faker->randomNumber(), $this->faker->text);
        $this->assertObjectHasAttribute('errors', $result);
    }

    public function test_can_send_message()
    {
        $result = $this->client->message->sendMessage($this->faker->numberBetween(9801134567, 9801234567), $this->faker->text);
        $this->assertObjectHasAttribute('message', $result);
        $this->assertStringContainsString($result->message, 'The message has been queued for delivery.');
        $this->assertObjectHasAttribute('identifier', $result);
    }
}
