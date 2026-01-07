<?php

namespace App\Services;

use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\RunReportRequest;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\StringFilter;
use Carbon\Carbon;


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
                new Metric(['name' => 'sessions']),
                new Metric(['name' => 'screenPageViews']),
            ],
        ]);

        $response = $this->client->runReport($request);

        $result = [
            'dates_raw' => [],
            'dates'     => [],
            'users'     => [],
            'sessions'  => [],
            'views'     => [],
        ];

        foreach ($response->getRows() as $row) {

            $rawDate = $row->getDimensionValues()[0]->getValue(); // Ymd

            $result['dates_raw'][] = $rawDate;
            $result['dates'][]     = Carbon::createFromFormat('Ymd', $rawDate)
                                            ->translatedFormat('d F Y');

            $result['users'][]    = (int) $row->getMetricValues()[0]->getValue();
            $result['sessions'][] = (int) $row->getMetricValues()[1]->getValue();
            $result['views'][]    = (int) $row->getMetricValues()[2]->getValue();
        }

        return $result;
    }

    public function getChannelReport(
    string $channel,
    $startDate = '30daysAgo',
    $endDate = 'today'
        ) {
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
                    new Metric(['name' => 'sessions']),
                ],
                'dimension_filter' => new FilterExpression([
                    'filter' => new Filter([
                        'field_name' => 'sessionDefaultChannelGroup',
                        'string_filter' => new StringFilter([
                            'value' => $channel,
                            'match_type' => StringFilter\MatchType::EXACT
                        ])
                    ])
                ])
            ]);

            $response = $this->client->runReport($request);

            $result = [];

            foreach ($response->getRows() as $row) {
                $date = $row->getDimensionValues()[0]->getValue();
                $result[$date] = (int) $row->getMetricValues()[0]->getValue();
            }

            return $result;
        }

       public function getSocialMediaReport($startDate, $endDate)
        {
            $dimensionFilter = new FilterExpression([
                'filter' => new Filter([
                    'field_name' => 'sessionDefaultChannelGroup',
                    'string_filter' => new StringFilter([
                        'value' => 'Organic Social',
                        'match_type' => StringFilter\MatchType::EXACT
                    ])
                ])
            ]);

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
                    new Metric(['name' => 'sessions']),
                    new Metric(['name' => 'screenPageViews']),
                ],
                'dimension_filter' => $dimensionFilter
            ]);

            $response = $this->client->runReport($request);

            $data = [];

            foreach ($response->getRows() as $row) {
                $rawDate = $row->getDimensionValues()[0]->getValue();

                $data[$rawDate] = [
                    'users'    => (int) $row->getMetricValues()[0]->getValue(),
                    'sessions' => (int) $row->getMetricValues()[1]->getValue(),
                    'views'    => (int) $row->getMetricValues()[2]->getValue(),
                ];
            }

            return $data;
        }

}
