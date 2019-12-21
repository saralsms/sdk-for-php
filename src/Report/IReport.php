<?php

namespace SaralSMS\Report;

interface IReport
{
    public function getReportById();

    public function getReportByIdentifier();

    public function getReports();
}
