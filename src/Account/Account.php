<?php

namespace SaralSMS\Account;

use Exception;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;

final class Account extends HttpRequest implements IAccount
{
    /**
     * This will return the user profile on behalf of
     * a authenticated token.
     * @return object
     * @throws SaralSMSException
     */
    public function profile()
    {
        try {
            $request = $this->request('GET', 'auth/user-meta');
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * This will return the account balance on behalf of
     * a authenticated token.
     * @return object
     * @throws SaralSMSException
     */
    public function balance()
    {
        try {
            $response = $this->request('GET', 'auth/user-meta');
            return json_decode($response, false)->amount;
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
