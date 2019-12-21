<?php

namespace SaralSMS\Message;

interface IMessage
{

    public function sendMessage($number, $message);

    public function sendBulkMessage($numbers, $message);
}
