<?php
session_start();

require_once '../libs/google-api-php-client/src/Google_Client.php';
require_once '../libs/google-api-php-client/src/contrib/Google_PlusService.php';

require_once '../libs/google-api-php-client/src/contrib/Google_Oauth2Service.php';




ob_start();


	$client = new Google_Client();
	$client->setApplicationName("APP-NAME");
	// Visit https://code.google.com/apis/console to generate your
	// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
	$client->setClientId(getenv('DEVELOPMENT_CLIENT_ID'));
	$client->setClientSecret(getenv('DEVELOPMENT_CLIENT_SECRET'));
	$client->setRedirectUri(getenv('DEVELOPMENT_REDIRECT_URI'));
	$client->setDeveloperKey(getenv('DEVELOPMENT_DEVELOPER_KEY'));
    
    $client->setAccessType("online");
    $client->setApprovalPrompt("auto");

    $plus = new Google_PlusService($client);
    $oauth2Service = new Google_Oauth2Service($client);

    if (isset($_REQUEST['logout'])) {
	unset($_SESSION['access_token']);
    }

    if (isset($_GET['code'])) {
	$client->authenticate($_GET['code']);
	$_SESSION['access_token'] = $client->getAccessToken();
	//header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    }

    if (isset($_SESSION['access_token'])) {
	$client->setAccessToken($_SESSION['access_token']);
    }

    if ($client->getAccessToken()) {
	$me = $plus->people->get('me');

	// These fields are currently filtered through the PHP sanitize filters.
	// See http://www.php.net/manual/en/filter.filters.sanitize.php
	$usr_id = filter_var($me['id'], FILTER_SANITIZE_STRING);
	$url = filter_var($me['url'], FILTER_VALIDATE_URL);
	$img = filter_var($me['image']['url'], FILTER_VALIDATE_URL);
	$name = filter_var($me['displayName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$userinfo = $oauth2Service->userinfo->get();
	$email = filter_var($userinfo["email"], FILTER_SANITIZE_EMAIL);
	//$email = filter_var($me['email'], FILTER_SANITIZE_EMAIL);
	echo "logged in\n"
	echo "email is : " . $email . "\n";

	// The access token may have been updated lazily.
	$_SESSION['access_token'] = $client->getAccessToken();

    } else {
	$authUrl = $client->createAuthUrl();
    }
?>