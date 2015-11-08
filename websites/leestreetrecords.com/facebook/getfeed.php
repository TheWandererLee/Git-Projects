<?php

$appId = '1616639515285352'; //Replace with your App ID
$appSecret = '4f46a2b253fc54311c71b8942a2cfdaa'; //Replace with your App Secret
$fb_id = '670107153042507'; //Replace with your Facebook ID


# Don't need to edit below this line #
######################################

require 'facebook.php';
$facebook = new Facebook(array(
    'appId' => $appId,
    'secret' => $appSecret,
));

$fbApiGetPosts = $facebook->api('/v2.1/'.$fb_id.'?fields=feed&date_format=U');

echo json_encode($fbApiGetPosts );

?>