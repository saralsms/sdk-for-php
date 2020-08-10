<?php

namespace SaralSMS\Message;

trait Message
{
    /**
     * This will send the message to single or multiple
     * numbers and return status.
     *
     * @param array $numbers
     * @param string $message
     *
     * @return object
     */
    public function send(array $numbers, string $message)
    {
        // format params
        $params = [
            'to' => implode(',', $numbers),
            'text' => $message,
        ];

        $response = $this->client
            ->request('POST', '/v1/send', [
                'json' => $params,
            ]);
        return json_decode($response->getBody(), false);
    }
}
