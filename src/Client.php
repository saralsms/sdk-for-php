<?php

namespace SaralSMS;

use SaralSMS\Credit\Credit;
use SaralSMS\Message\Message;
use SaralSMS\Report\Report;

class Client
{
    use Credit, Message, Report;

    /**
     * @var \GuzzleHttp\Client $httpClient
     */
    protected $httpClient;

    /**
     * Client constructor.
     *
     * @param string $authToken
     */
    public function __construct(string $authToken)
    {
        // set API base url
        $baseUrl = 'https://cloudapi.saralsms.com';

        // init Guzzle client
        $this->httpClient = new \GuzzleHttp\Client([
            'base_uri' => $baseUrl,
            'http_errors' => false,
            'headers' => [
                'User-Agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'X-Auth-Token' => $authToken,
            ],
            'allow_redirects' => [
                'protocols' => ['https'],
            ],
        ]);
    }
}
