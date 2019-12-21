<?php

namespace SaralSMS\Report;

use Exception;
use SaralSMS\Base;
use SaralSMS\Exception\SaralSMSException;

final class Report extends Base implements IReport
{
    /**
     * --------------------------------------------------
     * This will get message report based on Message ID.
     * --------------------------------------------------
     * @param int $messageId
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function getReportById($messageId)
    {
        // identifier is required
        if (empty($messageId) || !is_int($messageId)) {
            throw new SaralSMSException('The message ID is required.');
        }

        // init the params
        $params = array_merge(array('message_id' => $messageId), $this->authorization);

        try {
            $request = $this->request('POST', 'report/get-for-message', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * --------------------------------------------------
     * This will get message report based on Message identifier.
     * --------------------------------------------------
     * @param string $identifier
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function getReportByIdentifier($identifier)
    {
        // identifier is required
        if (empty($identifier)) {
            throw new SaralSMSException('The message identifier is required.');
        }

        // init the params
        $params = array_merge(array('identifier' => $identifier), $this->authorization);

        try {
            $request = $this->request('POST', 'report/get-for-identifier', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * --------------------------------------------------
     * This will get message report based on page number.
     * --------------------------------------------------
     * @param int $page
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function getReports($page)
    {
        // init the params
        if (!is_int($page) || $page <= 0) {
            $page = 1;
        }
        $params = array_merge(array('page' => $page), $this->authorization);

        try {
            $request = $this->request('POST', 'report/get-for-page', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
