<?php

namespace SaralSMS;

use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;

class Base extends HttpRequest
{
    /**
     * @var array $authorization
     */
    protected $authorization;

    /**
     * @param array $configs
     *
     * @throws SaralSMSException
     */
    public function init($configs)
    {
        // token required for authorization
        if (isset($configs['token']) && !empty($configs['token'])) {
            $this->authorization = array('token' => $configs['token']);
        } else {
            throw new SaralSMSException('The API token is required.');
        }

        // optional sandbox mode
        if (isset($configs['is_sandbox']) && $configs['is_sandbox']) {
            $this->baseUrl = 'https://sandboxapi.saralsms.com/v1/';
        } else {
            $this->baseUrl = 'https://api.saralsms.com/v1/';
        }
    }
}
