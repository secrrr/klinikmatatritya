<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GA4Service;

class AnalyticsController extends Controller
{
    public function index(GA4Service $analytics)
    {
        $data = $analytics->getReport();

        return view('admin.analytics.index', compact('data'));
    }
}
