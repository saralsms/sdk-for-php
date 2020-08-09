<?php

namespace SaralSMS\Credit;

use Exception;
use SaralSMS\Exception\SaralSMSException;

final class Credit
{
    /**
     * This will return the account credits on behalf of
     * a authenticated token.
     * @return object
     * @throws SaralSMSException
     */
    public function get()
    {
        try {
            $response = $this->request('GET', 'auth/user-meta');
            return json_decode($response, false)->amount;
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
