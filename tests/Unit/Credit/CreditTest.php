<?php

namespace Tests\Unit\Credit;

use Tests\ParentTestCase;

class CreditTest extends ParentTestCase
{
    /**
     * @covers \SaralSMS\Credit\Credit::getCredits
     */
    public function test_can_get_credits(): void
    {
        $response = $this->client->getCredits();
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Credit\Credit::getCredits
     */
    public function test_credit_is_numeric(): void
    {
        $response = $this->client->getCredits();
        self::assertIsNumeric($response->credit);
    }

    /**
     * @covers \SaralSMS\Credit\Credit::getCredits
     */
    public function test_total_sent_is_numeric(): void
    {
        $response = $this->client->getCredits();
        self::assertIsNumeric($response->total_sent);
    }
}
