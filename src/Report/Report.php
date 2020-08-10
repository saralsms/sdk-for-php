<?php

namespace SaralSMS\Report;

trait Report
{
    /**
     * This will return the reports on behalf of
     * a authenticated token.
     *
     * @param int $pageNumber
     *
     * @return object
     */
    public function getReports(int $pageNumber = 1)
    {
        // init page param
        $params = ['page' => $pageNumber];

        $response = $this->client
            ->request('GET', '/v1/reports', ['query' => $params]);
        return json_decode($response->getBody(), false);
    }
}
