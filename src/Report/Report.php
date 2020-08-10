<?php

namespace SaralSMS\Report;

trait Report
{
    /**
     * This will get message report based on Message ID.
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
            ->request('GET', '/v1/reports?' . http_build_query($params));
        return json_decode($response->getBody(), false);
    }
}
