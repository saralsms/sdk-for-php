<?php

namespace SaralSMS;

use Exception;

final class Account extends Client
{
    /**
     * --------------------------------------------------
     * This will return the use profile on behalf of
     * a authenticated token.
     * --------------------------------------------------
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function profile()
    {
        try {
            $request = $this->request('GET', 'account/profile', $this->authorization);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * --------------------------------------------------
     * This will return the account balance on behalf of
     * a authenticated token.
     * --------------------------------------------------
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function balance()
    {
        try {
            $request = $this->request('GET', 'account/balance', $this->authorization);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
