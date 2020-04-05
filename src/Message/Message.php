<?php

namespace SaralSMS\Message;

use Exception;
use SaralSMS\Exception\SaralSMSException;
use SaralSMS\Helper\HttpRequest;

final class Message extends HttpRequest implements IMessage
{
    /**
     * This will send the message to single number.
     *
     * @param string $number
     * @param string $message
     *
     * @return object
     * @throws SaralSMSException
     */
    public function sendMessage($number, $message)
    {
        // numbers array is required
        if (empty($number)) {
            throw new SaralSMSException('The number param is required.');
        }

        // message is required
        if (empty($message)) {
            throw new SaralSMSException('The message param is required.');
        }

        // init required params
        $params = array(
            'recipients' => array($number),
            'body' => $message,
        );

        try {
            $request = $this->request('POST', 'messages/send-bulk-sms', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * This will send the message to multiple number.
     *
     * @param array $numbers
     * @param string $message
     *
     * @return object
     * @throws SaralSMSException
     */
    public function sendBulkMessage($numbers, $message)
    {
        // numbers array is required
        if (!is_array($numbers) || empty($numbers)) {
            throw new SaralSMSException('The numbers param is required.');
        }

        // message is required
        if (empty($message)) {
            throw new SaralSMSException('The message param is required.');
        }

        // init required params
        $params = array(
            'recipients' => $numbers,
            'body' => $message,
        );

        try {
            $request = $this->request('POST', 'messages/send-bulk-sms', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
