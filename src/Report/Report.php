<?php

namespace SaralSMS\Report;

use Exception;
use SaralSMS\Exception\SaralSMSException;

trait Report
{
    /**
     * This will get message report based on Message ID.
     *
     * @param int $pageNumber
     *
     * @return object
     * @throws SaralSMSException
     */
    public function getReports(int $pageNumber)
    {
        // message ID is required
        if (empty($messageId) || !is_int($messageId)) {
            throw new SaralSMSException('The message ID param is required.');
        }

        try {
            $request = $this->request('GET', 'messages/' . $messageId);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
