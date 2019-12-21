<?php

namespace SaralSMS\Helper;

use SaralSMS\Exception\SaralSMSException;

class HttpRequest
{
    /**
     * --------------------------------------------------
     * create cURL client and make the http request.
     * --------------------------------------------------
     * @param $method
     * @param $url
     * @param array $params
     * @return string
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    protected function request($method, $url, $params = array())
    {
        // create a new cURL resource
        $curl = curl_init();

        // init default headers
        $headers = array('Accept', 'application/json');

        if ($method === 'POST') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($params));

            // custom headers
            $headers['Content-Type'] = array('Content-Type: application/json');
        } else {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_URL, $url . '?' . http_build_query($params));
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
