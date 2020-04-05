<?php

namespace SaralSMS\Report;

use Exception;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;

final class Report extends HttpRequest implements IReport
{
    /**
     * This will get message report based on Message ID.
     *
     * @param int $messageId
     *
     * @return object
     * @throws SaralSMSException
     */
    public function getReportById($messageId)
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

    /**
     * This will get message report based on Message identifier.
     *
     * @param string $identifier
     *
     * @return object
     * @throws SaralSMSException
     */
    public function getReportByIdentifier($identifier)
    {
        // identifier is required
        if (empty($identifier)) {
            throw new SaralSMSException('The message identifier param is required.');
        }

        try {
            $request = $this->request('GET', 'messages/' . $identifier);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
