<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnalyticsController extends Controller
{
public function data(Request $request)
{
$propertyId = config('services.ga4.property_id') ?: env('GA4_PROPERTY_ID');
$keyPath = env('GA4_KEY_PATH');


$end = $request->query('end', date('Y-m-d'));
$start = $request->query('start', date('Y-m-d', strtotime('-29 days', strtotime($end))));


$client = new BetaAnalyticsDataClient(["credentials" => $keyPath]);


$response = $client->runReport([
'property' => "properties/{$propertyId}",
'dateRanges' => [
['startDate' => $start, 'endDate' => $end]
],
'dimensions' => [['name' => 'date']],
'metrics' => [['name' => 'pageviews']],
]);

 dd($response);


// ambil rows
$rows = [];
$total = 0;
foreach ($response->getRows() as $row) {
$date = $row->getDimensionValues()[0]->getValue();
$pv = (int) $row->getMetricValues()[0]->getValue();
$rows[] = ['date' => $date, 'pageviews' => $pv];
$total += $pv;
}


$periodDays = max(1, count($rows));
$avg = $total / $periodDays;

$prevEnd = date('Y-m-d', strtotime($start . ' -1 day'));
$prevStart = date('Y-m-d', strtotime("{$prevEnd} -" . ($periodDays - 1) . " days"));


$prevResp = $client->runReport([
'property' => "properties/{$propertyId}",
'dateRanges' => [[ 'startDate' => $prevStart, 'endDate' => $prevEnd ]],
'metrics' => [['name' => 'pageviews']],
]);


$prevTotal = 0;
foreach ($prevResp->getRows() as $r) {
$prevTotal += (int) $r->getMetricValues()[0]->getValue();
}


$pctChange = $prevTotal > 0 ? round((($total - $prevTotal) / $prevTotal) * 100, 2) : null;


return response()->json([
'rows' => $rows,
'total' => $total,
'avg_per_day' => round($avg, 2),
'prev_total' => $prevTotal,
'pct_change' => $pctChange,
'period' => ['start' => $start, 'end' => $end],
'prev_period' => ['start' => $prevStart, 'end' => $prevEnd],
]);
}
}