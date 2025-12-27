<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;

class GA4Service
{
    protected $client;

    public function __construct()
    {
        $this->client = new BetaAnalyticsDataClient([
            'credentials' => base_path(env('GA4_KEY_PATH')),
            'transport'   => 'rest'
        ]);
    }

    public function getReport($startDate = '30daysAgo', $endDate = 'today')
    {
        $request = new RunReportRequest([
            'property' => 'properties/' . env('GA4_PROPERTY_ID'),
            'date_ranges' => [
                new DateRange([
                    'start_date' => $startDate,
                    'end_date'   => $endDate
                ])
            ],
            'dimensions' => [
                new Dimension(['name' => 'date']),
            ],
            'metrics' => [
                new Metric(['name' => 'activeUsers']),
                new Metric(['name' => 'screenPageViews']),
                new Metric(['name' => 'sessions']),
            ],
        ]);

        $response = $this->client->runReport($request);

        $result = [
            'dates'    => [],
            'users'    => [],
            'views'    => [],
            'sessions' => []
        ];

        foreach ($response->getRows() as $row) {
            $rawDate = $row->getDimensionValues()[0]->getValue();

            $formattedDate = \Carbon\Carbon::createFromFormat('Ymd', $rawDate)
                ->translatedFormat('d F Y');

            $result['dates'][]    = $formattedDate;
            $result['users'][]    = $row->getMetricValues()[0]->getValue();
            $result['views'][]    = $row->getMetricValues()[1]->getValue();
            $result['sessions'][] = $row->getMetricValues()[2]->getValue();
        }

        return $result;
    }
}
