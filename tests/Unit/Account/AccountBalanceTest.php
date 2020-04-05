<?php

namespace Tests\Unit\Account;

use SaralSMS\Exception\SaralSMSException;
use Tests\ParentTestCase;

class AccountBalanceTest extends ParentTestCase
{
    /**
     * @throws SaralSMSException
     */
    public function test_can_get_account_balance()
    {
        $balance = $this->client->account->balance();
        // must be an object
        $this->assertIsInt($balance);
    }
}
