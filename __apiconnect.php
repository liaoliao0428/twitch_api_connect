<?php

//申請twitch帳號後至開發人員所取得的client_id
$client_ID = 't3xhu5rioal6oif5kqlbvda6dmar2k';

/*
官方api所給的請求token的網址
"https://id.twitch.tv/oauth2/authorize?response_type=token&client_id=t3xhu5rioal6oif5kqlbvda6dmar2k&redirect_uri=http://localhost&scope=viewing_activity_read"

請求成功後會在所填的redirect_uri網址得到所要的token
"http://localhost/dashboard/#access_token=4jbc3pnflgavzs5h78v6a2tq2omesy&scope=viewing_activity_read&token_type=bearer"
*/
$token = 'Bearer 4jbc3pnflgavzs5h78v6a2tq2omesy';
$R_URI = 'https://api.twitch.tv/helix/games/top';//Request API URI
$_header = array(
    'client-ID: ' . $client_ID,
    'Authorization: ' . $token,
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $R_URI);
curl_setopt($curl, CURLOPT_HTTPHEADER, $_header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$temp = curl_exec($curl);
curl_close($curl);

//將得到的response處理成陣列 再將此陣列進行處理只列出需要的部分
$result = json_decode($temp,true);
$i = count($result['data']);
for($s=0;$s<$i;$s++){
    $number = $s+1;
    echo $number .  " " . ":" . " " . $result['data'][$s]['name'] . "<br/>" . "<br/>";
}

?>