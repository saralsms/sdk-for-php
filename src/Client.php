<?php

namespace SaralSMS;

use SaralSMS\Account\Account;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Message\Message;
use SaralSMS\Report\Report;

class Client extends Base
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
     * @throws SaralSMSException
     */
    public function __construct(array $configs)
    {
        // init the configs
        $this->init($configs);

        // init the classes
        $this->account = new Account();
        $this->message = new Message();
        $this->report = new Report();
    }
}
