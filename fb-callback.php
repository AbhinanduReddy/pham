<?php
require 'vendor/autoload.php';

session_start();

$fb = new Facebook\Facebook([
    'app_id' => '1375105666425224',
    'app_secret' => 'e3cf9aa77a25f40a540bd2aa6494ebcf',
    'default_graph_version' => 'v2.10',
]);


$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!isset($accessToken)) {
    header('Location: /'); // Redirect to the home page or login page
    exit;
}

try {
    $response = $fb->get('/me?fields=id,name,email', $accessToken);
    $user = $response->getGraphUser();

    // Store user information in session
    $_SESSION['fb_user_id'] = $user['id'];
    $_SESSION['fb_user_name'] = $user['name'];
    $_SESSION['fb_user_email'] = $user['email'];

    // Redirect back to index.php
    header('Location: index.php');
    exit;
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}