<?php

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
    public function profile(): object
    {
        try {
            $request = $this->client->request('GET', '/account/profile?' . http_build_query($this->authorization));
            return json_decode($request->getBody()->getContents(), false);
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
    public function balance(): object
    {
        try {
            $request = $this->client->request('GET', '/account/balance?' . http_build_query($this->authorization));
            return json_decode($request->getBody()->getContents(), false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
