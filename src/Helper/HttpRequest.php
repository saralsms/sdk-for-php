<?php

namespace SaralSMS\Helper;

use SaralSMS\Exception\SaralSMSException;

class HttpRequest
{
    /**
     * @var string $baseUrl
     */
    protected $baseUrl;

    /**
     * @var string $apiToken
     */
    protected $apiToken;

    public function __construct()
    {
        // init base url
        $this->baseUrl = getenv('SARALSMS_BASE_URL', true);
        // init API token
        $this->apiToken = getenv('SARALSMS_API_TOKEN', true);
    }

    /**
     * create cURL client and make the http request.
     *
     * @param string $method
     * @param string $route
     * @param array $params
     *
     * @return string
     * @throws SaralSMSException
     */
    protected function request($method, $route, $params = [])
    {
        // create a new cURL resource
        $curl = curl_init();

        // init default headers
        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'X-API-Token: ' . $this->apiToken,
        ];

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_URL, $this->baseUrl . $route);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));
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
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

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
