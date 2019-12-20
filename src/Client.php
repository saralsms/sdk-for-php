<?php

class Client
{
    /**
     * @var string $liveUrl
     */
    private $liveUrl = 'https://api.saralsms.com/v1/';

    /**
     * @var string $sandboxUrl
     */
    private $sandboxUrl = 'https://devapi.saralsms.com/v1/';

    /**
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * @var \GuzzleHttp\Client $client
     */
    protected $client;

    /**
     * @var array $authorization
     */
    protected $authorization;

    /**
     * @param array $configs
     * @throws SaralSMSException
     */
    public function __construct(array $configs)
    {
        // token required for authorization
        if (isset($configs['token']) && !empty($configs['token'])) {
            $this->authorization = ['token' => $configs['token']];
        } else {
            throw new SaralSMSException('The API token is required.');
        }

        // optional sandbox mode
        if (isset($configs['is_sandbox']) && $configs['is_sandbox']) {
            $this->baseUrl = $this->sandboxUrl;
        } else {
            $this->baseUrl = $this->liveUrl;
        }

        // init guzzle client
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $this->baseUrl
        ]);
    }
}
