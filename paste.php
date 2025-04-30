<?php
$api_dev_key = '5supLjKUBT9hGpupwPuIAlqppkIx800X';
$api_paste_code = $_POST['text'] ?? 'Empty';
$api_paste_name = $_POST['title'] ?? 'Untitled';
$api_paste_private = '1'; // 0=public 1=unlisted 2=private
$api_paste_expire_date = '10M';
$api_paste_format = 'text';
$api_user_key = ''; // optional

$api_paste_name = urlencode($api_paste_name);
$api_paste_code = urlencode($api_paste_code);

$url = 'https://pastebin.com/api/api_post.php';

$data = 'api_option=paste'
      . '&api_user_key=' . $api_user_key
      . '&api_paste_private=' . $api_paste_private
      . '&api_paste_name=' . $api_paste_name
      . '&api_paste_expire_date=' . $api_paste_expire_date
      . '&api_paste_format=' . $api_paste_format
      . '&api_dev_key=' . $api_dev_key
      . '&api_paste_code=' . $api_paste_code;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
