<?php

namespace Tests\Unit\Report;

use Tests\ParentTestCase;

class ReportTest extends ParentTestCase
{
    public function test_can_get_report()
    {
        if (getenv('SARALSMS_MESSAGE_IDENTIFIER')) {
            $identifier = getenv('SARALSMS_MESSAGE_IDENTIFIER');
        } else {
            $identifier = $_SERVER['SARALSMS_MESSAGE_IDENTIFIER'];
        }

        $result = $this->client->report->getReportByIdentifier($identifier);
        $this->assertObjectHasAttribute('recipients', $result);
    }
}
