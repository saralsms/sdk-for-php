<?php

namespace Tests\Unit\Account;

use SaralSMS\Exception\SaralSMSException;
use Tests\ParentTestCase;

class AccountProfileTest extends ParentTestCase
{
    /**
     * @throws SaralSMSException
     */
    public function test_can_get_account_profile()
    {
        $profile = $this->client->account->profile();

        // must be an object
        $this->assertIsObject($profile);

        // must contains id and int
        $this->assertObjectHasAttribute('id', $profile);
    }
}
