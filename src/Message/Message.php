<?php

namespace SaralSMS\Message;

use Exception;
use SaralSMS\Base;
use SaralSMS\Exception\SaralSMSException;

final class Message extends Base implements IMessage
{
    /**
     * --------------------------------------------------
     * This will send the message to single number.
     * --------------------------------------------------
     * @param string $number
     * @param string $message
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function sendMessage($number, $message)
    {
        // init required params
        $params = array_merge($this->authorization, array(
            'to' => $number,
            'text' => $message
        ));

        try {
            $request = $this->request('POST', 'message/sendMessage', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * --------------------------------------------------
     * This will send the message to multiple number.
     * --------------------------------------------------
     * @param array $numbers
     * @param string $message
     * @return object
     * @throws SaralSMSException
     * --------------------------------------------------
     */
    public function sendBulkMessage($numbers, $message)
    {
        // init required params
        $params = array_merge($this->authorization, array(
            'to' => $numbers,
            'text' => $message
        ));

        try {
            $request = $this->request('POST', 'message/sendBulkMessage', $params);
            return json_decode($request, false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
