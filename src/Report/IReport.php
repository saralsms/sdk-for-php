<?php

namespace SaralSMS\Report;

interface IReport
{
    public function getReportById($messageId);

    public function getReportByIdentifier($identifier);

    public function getReports($page);
}
