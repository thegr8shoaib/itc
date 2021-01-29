<?php


function setting($key, $default = null)
{
    $setting = App\Setting::where('userId', Auth::id())->where('uniqueName', $key)->first();
    if ($setting == null) {
        return $default;
    }
    return $setting->value;
}

function setSetting($key, $value)
{
    App\Setting::where('userId', Auth::id())->where('uniqueName', $key)->delete();
    return App\Setting::insert([
    'userId'=>Auth::id(),
    'uniqueName'=>$key,
    'value'=> $value
  ]);
}


function getYoutubeVideoInfo($ref)
{
    try {
        $url = 'http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=' . $ref . '&format=json';
        $response = \Illuminate\Support\Facades\Http::get($url);
        if ($response->successful()) {
            return (object)$response->json();
        }
        if ($response->status() == 404) {
            return 404;
        }
        return null;
    } catch (\Exception $e) {
        return null;
    }
}

function stringToUrlFriendly($str)
{
    return preg_replace('/\W+/', '-', strtolower($str));
}


function testEmail()
{
    $email = "mawaisnow@gmail.com";
    \Mail::to($email)->send(new App\Mail\TestEmail());
}





function unixtoDate($timestamp)
{
    if ($timestamp == null) {
        return '';
    }
    $carbon = \Carbon\Carbon::createFromTimestamp($timestamp);
    return $carbon->format('F d, Y');
}
function dateTimeToFormatedDate($timestamp , $format = "F d, Y")
{
    if ($timestamp == null) {
        return '';
    }
    $carbon = \Carbon\Carbon::parse($timestamp);
    return $carbon->format($format);
}

function json($status, $message, $data = null)
{
    return response()->json([
    'status'=> $status,
    'message'=> $message,
    'data'=> $data
  ]);
}


function logError($data, $title = '', $bit = 0)
{
    try {
        if (!is_valid_json($data)) {
            $data = json_encode($data);
        }
    } catch (\Exception $e) {
        $data = $e->getMessage();
    }



    $log = new \App\MyLog;
    $log->details = $data;
    $log->title = $title;
    $log->bit = $bit;
    $log->save();
}
function saveLog($logData)
{
    try {
        if (!is_valid_json($logData)) {
            $logData = json_encode($logData);
        }
    } catch (\Exception $e) {
        $logData = $e->getMessage();
    }



    $log = new \App\MyLog;
    $log->details = $logData;
    $log->save();
}
function error($message)
{
    return redirect()->back()->withInput()->withErrors([$message]);
}
function errorTo($message, $to)
{
    return redirect($to)->withInput()->withErrors([$message]);
}
function errorMessage($message)
{
    return redirect()->back()->withInput()->withErrors([$message]);
}
function redirectTo($url)
{
    return redirect($url)->withInput();
}

function getClassMethodsName($classObjectOrName)
{
    $names = get_class_methods($classObjectOrName);
    ddd(
        $names
    );
}
function status($message)
{
    return redirectBackWith('status', $message);
}
function statusTo($message, $route)
{
    return redirect($route)->with('status', $message);
}
function redirectBackWith($key, $value)
{
    return redirect()->back()->with($key, $value);
}
function superAdmin()
{
    if (\Auth()->user()->role == 9) {
        return true;
    }
    return false;
}
function noPermission()
{
    return errorMessage("You don't have permission to do this operation");
}
function isAuthorizedToModify($id)
{
    if (\Auth::id() == $id || superAdmin()) {
        return true;
    }
    return false;
}

function pasteVal($actual, $old)
{
    if (old($old) != null) {
        return old($old);
    }
    return $actual;
}
function isRouteName($name)
{
    if (request()->route()->getName() == $name) {
        return true;
    }
    return false;
}
function requestIs($path)
{
    if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
        return 'active';
    }
}
function requestIsFromArray($arr)
{
    foreach ($arr as $path) {
        if (request()->route()->getName() == $path || request()->is($path) || request()->is($path ."/*")) {
            return 'active';
        }
    }
}
function userUpdate($data)
{
    $userId = Auth::id();
    \App\User::where('id', $userId)->update($data);
}


function newNoti($type, $title, $description, $redirectUrl, $forUser, $redirectRoute = null)
{
    App\Notification::create([
    'type' => $type,
    'title'=> $title,
    'description'=> $description,
    'redirectURL' => $redirectUrl,
    'redirectRoute'=> $redirectRoute,
    'forUser'=>$forUser
  ]);
}

function getNotifcations($limit = 10, $isAdmin = false)
{
    $obj = new \stdClass;
    if ($isAdmin) {
        $obj->notification = App\Notification::where('forUser', 0)->limit($limit)->orderBy('id', 'desc')->get();
    } else {
        $obj->notification = App\Notification::where('forUser', \Auth::id())->limit($limit)->orderBy('id', 'desc')->get();
    }
    $obj->hasNew = $obj->notification->where('status', 0)->count();
    $obj->new = $obj->notification->where('status', 0);
    $obj->old = $obj->notification->where('status', 1);
    $obj->hasOld = $obj->notification->where('status', 1)->count();

    $obj->hasNotification = $obj->notification->count();
    return $obj;
}


function writeJson($data, $file = '')
{
    $file = date('Y_m_d_H_i_s_A') ."_". $file ."_". ".json";
    \Storage::disk('logs')->put($file, json_encode($data));
}
function writeToFile($text, $file = "file", $ext = "txt", $replace = 0)
{
    if ($replace) {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    } else {
        \Storage::disk('logs')->put($file.'.'.$ext, $text);
    }
}



function generateCSV($data, $headings)
{
    $csvExporter = new \Laracsv\Export();
    $csvExporter->build($data, $headings);

    return $csvExporter->download();
}
function conf($key, $default = null)
{
    return config("mawaisnow.$key", $default);
}

function is_valid_json($raw_json)
{
    try {
        return (json_decode($raw_json, true) == null) ? false : true ; // Yes! thats it.
    } catch (\Exception $e) {
        return false;
    }
}

function getRandomStr($str = '')
{
    $rnd = Illuminate\Support\Str::random(40);
    return $rnd . $str;
}

function dev()
{
    if (session('dev')) {
        return true;
    }
    if (request()->cookie('dev')) {
        return true;
    }
    return false;
}
function createRandStr($length, $spChars = false)
{
    $alpha = 'abcdefghijklmnopqrstwvxyz';
    $alphaUp = strtoupper($alpha);
    $num = '12345678901234567890';
    $sp = '@/+.*-\$#!)[';
    $thread = $alpha.$alphaUp.$num;
    if ($spChars) {
        $thread .= $sp;
    }
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $thread[mt_rand(0, strlen($thread)-1)];
    }
    return $str;
}
function bankNames()
{
    $array = [
          [ 'name'=> 'Faysal Bank', 'code'=> '601373' ], [ 'name'=> 'Jazz Cash Wallet', 'code'=> '585953' ],
          [ 'name'=> 'Dubai Islamic', 'code'=> '428273' ], [ 'name'=> 'Standard Chartered', 'code'=> '627271' ],
          [ 'name'=> 'NRSP Microfinance', 'code'=> '586010' ], [ 'name'=> 'APNA Microfinance', 'code'=> '581862' ],
          [ 'name'=> 'CitiBank', 'code'=> '508117' ], [ 'name'=> 'Samba Bank', 'code'=> '606101' ],
          [ 'name'=> 'Soneri Bank', 'code'=> '786110' ], [ 'name'=> 'Sindh Bank', 'code'=> '505439' ],
          [ 'name'=> 'Askari Bank', 'code'=> '603011' ], [ 'name'=> 'Allied Bank', 'code'=> '589430' ],
          [ 'name'=> 'Burj Bank', 'code'=> '604786' ], [ 'name'=> 'The First Microfinance Bank', 'code'=> '220557' ],
          [ 'name'=> 'ICBC Pakistan', 'code'=> '621464' ], [ 'name'=> 'First Women Bank', 'code'=> '628138' ],
          [ 'name'=> 'NayaPay', 'code'=> '220583' ], [ 'name'=> 'Bank of Punjab', 'code'=> '623977' ],
          [ 'name'=> 'HBL KONNECT', 'code'=> '600648' ], [ 'name'=> 'FINCA SimSim Wallet', 'code'=> '502841' ],
          [ 'name'=> 'Bank of khyber', 'code'=> '627618' ], [ 'name'=> 'Bank Al-Habib', 'code'=> '627197' ],
          [ 'name'=> 'U Microfinance Bank', 'code'=> '581886' ], [ 'name'=> 'MCB Islamic', 'code'=> '507642' ],
          [ 'name'=> 'Zarai Taraqiati Bank', 'code'=> '220564' ], [ 'name'=> 'Summit Bank', 'code'=> '604781' ],
          [ 'name'=> 'Khushhali Microfinance Bank', 'code'=> '220563' ], [ 'name'=> 'Habib Metro', 'code'=> '627408' ],
          [ 'name'=> 'UBL', 'code'=> '588974' ], [ 'name'=> 'EasyPaisa Wallet', 'code'=> '639390' ],
          [ 'name'=> 'Silk Bank', 'code'=> '627544' ], [ 'name'=> 'NBP', 'code'=> '958600' ],
          [ 'name'=> 'FINJA', 'code'=> '220591' ], [ 'name'=> 'Al Baraka Bank', 'code'=> '627688' ],
          [ 'name'=> 'Bankislami', 'code'=> '639357' ], [ 'name'=> 'Bank Alfalah', 'code'=> '627100' ],
          [ 'name'=> 'MCB', 'code'=> '589388' ], [ 'name'=> 'JS Bank', 'code'=> '603733' ],
          [ 'name'=> 'Meezan Bank Limited', 'code'=> '627873' ]
  ];
  return $array;
}
function downloadUrlToFile($url, $outFileName)
{
    if(is_file($url)) {
        copy($url, $outFileName);
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}
