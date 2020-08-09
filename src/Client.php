<?php

namespace SaralSMS;

use SaralSMS\Credit\Credit;
use SaralSMS\Message\Message;
use SaralSMS\Report\Report;

class Client
{
    use Credit, Message, Report;

    /**
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * @var string $authToken
     */
    protected $authToken;

    /**
     * Client constructor.
     *
     * @param string $authToken
     */
    public function __construct(string $authToken)
    {
        // set API base url
        $this->baseUrl = 'https://cloudapi.saralsms.com/v1';
        // init the token
        $this->authToken = $authToken;
    }
}
