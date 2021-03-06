<?php

namespace SaralSMS\Credit;

trait Credit
{
    /**
     * This will return the account credits on behalf of
     * a authenticated token.
     * @return object
     */
    public function getCredits(): object
    {
        $response = $this->client
            ->request('GET', '/v1/credits');
        return json_decode($response->getBody(), false);
    }
}
