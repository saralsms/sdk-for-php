<?php

final class Message extends Client
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
    public function sendMessage(string $number, string $message): object
    {
        // init required params
        $params = array_merge($this->authorization, [
            'to' => $number,
            'text' => $message
        ]);

        try {
            $request = $this->client->request('POST', '/message/sendMessage', ['form_params' => $params]);
            return json_decode($request->getBody()->getContents(), false);
        } catch (Exception $e) {
            throw new SaralSMSException($e->getMessage(), $e->getCode());
        }
    }
}
