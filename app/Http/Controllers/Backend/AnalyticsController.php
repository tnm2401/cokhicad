<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Validate;
use Spatie\Analytics\Period;
use Analytics;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class AnalyticsController extends ShareController
{///Trình duyệt////////////////
public function browser(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $bs = Analytics::fetchTopBrowsers((Period::create($startDate, $endDate) ));
    return response($bs);
}

public function browser_yesterday(){
    $endDate = Carbon::today();
    $startDate = Carbon::yesterday();
    $bs = Analytics::fetchTopBrowsers((Period::create($startDate, $endDate) ));
    return response($bs);
}

public function browser_7day(){
    $bs = Analytics::fetchTopBrowsers((Period::days(7)));
    return response($bs);
}

public function browser_thisweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $bs = Analytics::fetchTopBrowsers((Period::create($startDate, $endDate) ));
    return response($bs);
}

public function browser_30day(){
     $bs = Analytics::fetchTopBrowsers((Period::days(30)));
    return response($bs);
}

public function browser_thismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $bs = Analytics::fetchTopBrowsers((Period::create($startDate, $endDate) ));
    return response($bs);
}

public function browser_thisyear(){
    $bs = Analytics::fetchTopBrowsers((Period::years(1)));
    return response($bs);
}
///End Trình duyệt////////////////
//Truy cập///////////////
public function access(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'access',
    [
    'metrics' => 'ga:users, ga:pageviews',
    'dimensions' => 'ga:hour',
    ]);
    return ($analyticsData->rows);
}

public function access_yesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'access2',
    [
    'metrics' => 'ga:users, ga:pageviews',
    'dimensions' => 'ga:hour',
    ]);
    return ($analyticsData->rows);
}

public function access_7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'access2',
    [
    'metrics' => 'ga:users, ga:pageviews',
    'dimensions' => 'ga:date',
    ]);
    return ($analyticsData['rows']);
}

public function access_thisweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'access2',
        [
        'metrics' => 'ga:users, ga:pageviews',
        'dimensions' => 'ga:date',
        ]);
    return ($analyticsData['rows']);
}

public function access_30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'access2',
        [
        'metrics' => 'ga:users, ga:pageviews',
        'dimensions' => 'ga:date',
        ]);
    return ($analyticsData['rows']);
}

public function access_thismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'access2',
        [
        'metrics' => 'ga:users, ga:pageviews',
        'dimensions' => 'ga:date',
        ]);
    return ($analyticsData['rows']);
}

public function access_thisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'access2',
        [
        'metrics' => 'ga:users, ga:pageviews',
        'dimensions' => 'ga:month',
        ]);


    return ($analyticsData['rows']);
}

//////////////Quốc gia/////////////////////

public function country(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'country',
    [
    'metrics' => 'ga:users',
    'dimensions' => 'ga:country',
    'sort' => '-ga:country'
    ]);
    return ($analyticsData->rows);
}

public function country_yesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'country2',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:country',
        'sort' => '-ga:country'
    ]);
    return ($analyticsData->rows);
}

public function country_7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'country2',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:country',
        'sort' => '-ga:country'
    ]);
    return ($analyticsData['rows']);
}

public function country_thisweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'country2',
        [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            'sort' => '-ga:country'
        ]);
    return ($analyticsData['rows']);
}

public function country_30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'country2',
        [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            // 'max-results'=>15,
            'sort' => '-ga:country'
        ]);
    return ($analyticsData['rows']);
}

public function country_thismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'country2',
        [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            // 'max-results'=>15,
            'sort' => '-ga:country'
        ]);
    return ($analyticsData['rows']);
}

public function country_thisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'country2',
        [
            'metrics' => 'ga:users',
            'dimensions' => 'ga:country',
            // 'max-results'=>15,
            'sort' => '-ga:country'
        ]);

    return ($analyticsData['rows']);
}

///////////////////////////////////
/////////////Trang xem nhiều/////////////////////

public function pageview(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageviewyesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageview7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageviewweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageview30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageviewthismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);

    return response()->json(['data' => $analyticsData->rows], 200);
}

public function pageviewthisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'pageview',
    [
    'metrics' => 'ga:pageviews',
    'dimensions' => 'ga:pageTitle',
    'sort' => '-ga:pageviews'
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

/////////////Thiết Bị/////////////////////
public function device(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'device',
    [
    'metrics' => 'ga:users',
    'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function deviceyesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function device7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function deviceweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function device30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function devicethismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}

public function devicethisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'device',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:deviceCategory',
    ]);
    return ($analyticsData->rows);
}
/////////////Thiết Bị/////////////////////
/////////////Nguồn khách hàng/////////////////////
public function referral(){
    $endDate = Carbon::today();
    $startDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'referral',
    [
    'metrics' => 'ga:users',
    'dimensions' => 'ga:fullReferrer',
    ]);
    // dd($analyticsData->rows);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referralyesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referral7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referralweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referral30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referralthismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}

public function referralthisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'referral',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:fullReferrer',
    ]);
    return response()->json(['data' => $analyticsData->rows], 200);
}
/////////////Nguồn khách hàng/////////////////////
/////////////Xem tổng quát/////////////////////
public function dashboard(){
    $endDate = Carbon::today();
    $startDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'dashboard',
    [
    'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
    ]);
    return $analyticsData->rows;
}

public function dashboardyesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'dashboard',
    [
    'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
    ]);
    return $analyticsData->rows;
}

public function dashboard7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'dashboard',
    [
    'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
    ]);
    return $analyticsData->rows;
}

public function dashboardweek(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'dashboard',
        [
        'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
        ]);
        return $analyticsData->rows;
}

public function dashboard30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'dashboard',
        [
        'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
        ]);
        return $analyticsData->rows;
}

public function dashboardthismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'dashboard',
        [
        'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
        ]);
        return $analyticsData->rows;
}

public function dashboardthisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
        'dashboard',
        [
        'metrics' => 'ga:sessions,ga:users,ga:newUsers,ga:pageviews,ga:exitRate,ga:percentNewSessions,ga:pageviewsPerSession,ga:avgSessionDuration',
        ]);
        return $analyticsData->rows;
}
/////////////Xem tổng quát/////////////////////
//////////từ khóa///////////
public function keyword(){
    $startDate = Carbon::today();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'keyword',
    [
    'metrics' => 'ga:sessions',
    'dimensions' => 'ga:keyword',
    ]);
    return ($analyticsData->rows);
}

public function keyword_yesterday(){
    $startDate = Carbon::yesterday();
    $endDate = Carbon::today();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:keywordCategory',
    ]);
    return ($analyticsData->rows);
}

public function keyword_7day(){
    $startDate = Carbon::today()->subday(7);
    $endDate = Carbon::yesterday();
    $analyticsData = Analytics::performQuery(
    Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:keywordCategory',
    ]);
    return ($analyticsData->rows);
}

public function keyword_week(){
    $startDate = Carbon::now()->startOfWeek();
    $endDate = Carbon::now()->endOfWeek();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:keywordCategory',
    ]);
    return ($analyticsData->rows);
}

public function keyword_30day(){
    $endDate = Carbon::today();
    $startDate = Carbon::today()->subday(30);
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:keywordCategory',
    ]);
    return ($analyticsData->rows);
}

public function keyword_thismonth(){
    $endDate = Carbon::parse('last day of this month');
    $startDate = Carbon::parse('first day of this month');
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:users',
        'dimensions' => 'ga:keywordCategory',
    ]);
    return ($analyticsData->rows);
}

public function keyword_thisyear(){
    $endDate = Carbon::now()->endOfYear();
    $startDate = Carbon::now()->startOfYear();
    $analyticsData = Analytics::performQuery(
        Period::create($startDate, $endDate),
    'keyword',
    [
        'metrics' => 'ga:sessions',
        'dimensions' => 'ga:keyword',
    ]);
    return ($analyticsData->rows);
}


}

