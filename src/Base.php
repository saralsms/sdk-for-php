<?php

namespace SaralSMS;

use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;
use SaralSMS\Helper\Loader;

class Base extends HttpRequest
{
    /**
     * @var Loader $loader
     */
    protected $loader;

    /**
     * @var array $authorization
     */
    protected $authorization;

    /**
     * @param array $configs
     * @throws SaralSMSException
     */
    public function init($configs)
    {
        // init env loader
        if (!class_exists('Loader')) {
            $this->loader = new Loader();
        }

        // token required for authorization
        if (isset($configs['token']) && !empty($configs['token'])) {
            $this->authorization = array('token' => $configs['token']);
        } else {
            throw new SaralSMSException('The API token is required.');
        }

        // optional sandbox mode
        if (isset($configs['is_sandbox']) && $configs['is_sandbox']) {
            $this->baseUrl = $this->loader->getEnv('SARALSMS_SANDBOX_URL');
        } else {
            $this->baseUrl = $this->loader->getEnv('SARALSMS_LIVE_URL');
        }
    }
}
