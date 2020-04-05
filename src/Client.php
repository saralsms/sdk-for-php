<?php

namespace SaralSMS;

use SaralSMS\Account\Account;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;
use SaralSMS\Message\Message;
use SaralSMS\Report\Report;

class Client extends HttpRequest
{
    /**
     * @var Account $account
     */
    public $account;

    /**
     * @var Message $message
     */
    public $message;

    /**
     * @var Report $report
     */
    public $report;

    /**
     * @param array $configs
     *
     * @throws SaralSMSException
     */
    public function __construct(array $configs)
    {
        // init the configs
        $this->init($configs);
    }

    /**
     * @param array $configs
     *
     * @return void
     * @throws SaralSMSException
     */
    public function init($configs)
    {
        // token required for authorization
        if (isset($configs['token']) && !empty($configs['token'])) {
            $this->apiToken = $configs['token'];
        } else {
            throw new SaralSMSException('The API token is required.');
        }

        // check integration mode
        if (isset($configs['is_sandbox']) && $configs['is_sandbox']) {
            $cname = 'sandboxapi';
        } else {
            $cname = 'api';
        }

        // set base url
        $this->baseUrl = 'https://' . $cname . '.saralsms.com/v1/';

        // init the modules
        $this->account = new Account;
        $this->message = new Message;
        $this->report = new Report;
    }
}
