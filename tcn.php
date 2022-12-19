<?

function suoUrl($userSendMsg)
{
    $appKey = '8ec076c255224956a9659e5bf28e9a6b'; // 应用的key
    $sid = '27989';
    $suoHost = 'https://api.zhetaoke.com:10001/api/open_shorturl_sina_get.ashx';
    $suoData = [
        'url' => urlencode($userSendMsg),
        'key' => $appKey,
        'sid' => $sid
    ];
    $suoGetUrl = "$suoHost?content=$suoData[url]&appkey=$suoData[key]&sid=$suoData[sid]";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $suoGetUrl);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $suoReply = curl_exec($ch);
    $suoResult = json_decode($suoReply);
    $suoOutput = $suoResult->shorturl;
    curl_close($ch);
    return $suoOutput;
}

// get post data, May be due to the different environments
$postStr = $_POST['orgUrl'];
// echo $postStr;
// extract post data
if (! empty($postStr)) {
    /*
     * libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
     * the best way is to check the validity of xml by yourself
     */
    $sUrl=suoUrl($postStr);
    echo '<br><a target=_blank href='.$sUrl.'>'.$sUrl.'</a><br>';
} else {
    echo "no data";
}
?>
<br><form action="/t" method="post">
	<input type="text" size="128" name="orgUrl" /> <input type="submit"
		value="Submit" />
</form>