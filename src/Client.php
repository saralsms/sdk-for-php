<?php

namespace SaralSMS;

use SaralSMS\Credit\Credit;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Message\Message;
use SaralSMS\Report\Report;

class Client
{
    use Credit, Message, Report;

    /**
     * @var Credit $account
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
            putenv('SARALSMS_API_TOKEN=' . $configs['token']);
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
        putenv('SARALSMS_BASE_URL=' . 'https://' . $cname . '.saralsms.com/v1/');
    }
}
