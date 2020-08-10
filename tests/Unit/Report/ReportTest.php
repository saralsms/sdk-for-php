<?php

namespace Tests\Unit\Report;

use Tests\ParentTestCase;

class ReportTest extends ParentTestCase
{
    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_can_get_reports(): void
    {
        $response = $this->client->getReports();
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_can_get_reports_with_page_number(): void
    {
        $response = $this->client->getReports(self::$faker->randomDigit);
        self::assertIsObject($response);
    }

    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_object_key_pages_is_numeric(): void
    {
        $response = $this->client->getReports();
        self::assertIsInt($response->pages);
    }

    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_object_key_pages_is_numeric_with_page_number(): void
    {
        $response = $this->client->getReports(self::$faker->randomDigit);
        self::assertIsInt($response->pages);
    }

    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_object_key_data_is_array(): void
    {
        $response = $this->client->getReports();
        self::assertIsArray($response->data);
    }

    /**
     * @covers \SaralSMS\Report\Report::getReports
     */
    public function test_object_key_data_is_array_with_page_number(): void
    {
        $response = $this->client->getReports(self::$faker->randomDigit);
        self::assertIsArray($response->data);
    }
}
