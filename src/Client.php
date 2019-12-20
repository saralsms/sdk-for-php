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
            $this->authorization = array('token' => $configs['token']);
        } else {
            throw new SaralSMSException('The API token is required.');
        }

        // optional sandbox mode
        if (isset($configs['is_sandbox']) && $configs['is_sandbox']) {
            $this->baseUrl = $this->sandboxUrl;
        } else {
            $this->baseUrl = $this->liveUrl;
        }
    }

    /**
     * --------------------------------------------------
     * create cURL client and make the http request.
     * --------------------------------------------------
     * @param $method
     * @param $route
     * @param array $params
     * @return string
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    protected function request($method, $route, $params = array())
    {
        // create a new cURL resource
        $curl = curl_init();

        // init default headers
        $headers = array('Accept', 'application/json');

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_URL, $this->baseUrl . $route);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));

            // custom headers
            $headers['Content-Type'] = array('Content-Type: application/json');
        } else {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_URL, $this->baseUrl . $route . '?' . http_build_query($params));
        }

        // set options
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);

        // apply headers
        curl_setopt($curl, CURLOPT_HTTPHEADER, implode(': ', $headers));

        // grab the content
        $response = curl_exec($curl);

        // handle errors
        if ($response === false) {
            throw new SaralSMSException(curl_error($curl));
        }

        // close cURL resource
        curl_close($curl);
        return $response;
    }
}
