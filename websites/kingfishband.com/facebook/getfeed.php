<?php

$appId = '1643002352597491'; //Replace with your App ID
$appSecret = 'fbe585e20cebe81b07c6e405c29fb774'; //Replace with your App Secret
$fb_id = '766916883333224'; //Replace with your Facebook ID


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