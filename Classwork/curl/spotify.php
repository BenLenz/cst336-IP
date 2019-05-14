<?php

$apiKey = 'BQA0ENsxaMb1-4qM866E3wmNLKtJWDfxihjSO0foFurcCu6Y2NnebLNo7J2q8fK3b_El-vJHJNjjkFWXaiDgFR54dKS7anG5qYudHqKeNeymFjl-SBK0ynwZ_oD8ZLQCwLKEBAdKYl1zILw4J-m1x0AnxREtPfGqSw';
$session = curl_init();

curl_setopt($session, CURLOPT_URL, 'https://api.spotify.com/v1/artists/0TnOYISbd1XYRBk9myaseg');
curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer BQA0ENsxaMb1-4qM866E3wmNLKtJWDfxihjSO0foFurcCu6Y2NnebLNo7J2q8fK3b_El-vJHJNjjkFWXaiDgFR54dKS7anG5qYudHqKeNeymFjl-SBK0ynwZ_oD8ZLQCwLKEBAdKYl1zILw4J-m1x0AnxREtPfGqSw';
curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($session);
if (curl_errno($session)) {
    echo 'Error:' . curl_error($session);
}

$json = json_decode($result);

echo $json->genres[0];
curl_close ($session);


?>