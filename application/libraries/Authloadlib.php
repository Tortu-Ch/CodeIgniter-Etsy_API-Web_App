<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__ . '/OAuth/bootstrap.php';

use OAuth\OAuth1\Service\Etsy;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
use OAuth\ServiceFactory;
use OAuth\Common\Http\Uri\Uri;
/**
* Bootstrap the example
*/

// Session storage

class Authloadlib {

//    public function getToken()
    function __construct()
    {
        $storage = new Session();
        // Setup the credentials for the requests
        $credentials = new Credentials(
           '5nuye4b6qyaf43za5psqv4db',
            'b7mqv67ai8',
            'http://localhost/LoadCategories'
        );
        //d0e9ca54
        // Instantiate the Etsy service using the credentials, http client and storage mechanism for the token
        /** @var $etsyService Etsy */
        $serviceFactory = new ServiceFactory();
        $currentUri = new Uri();
        $etsyService = $serviceFactory->createService('Etsy', $credentials, $storage);
        if (!empty($_GET['oauth_token'])) {
            $token = $storage->retrieveAccessToken('Etsy');
            // This was a callback request from Etsy, get the token
            $etsyService->requestAccessToken(
                $_GET['oauth_token'],
                $_GET['oauth_verifier'],
                $token->getRequestTokenSecret()
            );
            // Send a request now that we have access token
            $result = json_decode($etsyService->request('/private/users/__SELF__'));

/*
            // get temporary credentials from the url
            $request_token = $_GET['oauth_token'];

            // get the temporary credentials secret - this assumes you set the request secret
            // in a cookie, but you may also set it in a database or elsewhere
            $request_token_secret = $_COOKIE['request_secret'];

            // get the verifier from the url
            $verifier = $_GET['oauth_verifier'];

            $oauth = new OAuth('5nuye4b6qyaf43za5psqv4db', 'b7mqv67ai8');

            // set the temporary credentials and secret
            $oauth->setToken($request_token, $request_token_secret);

            try {
                // set the verifier and request Etsy's token credentials url
                $acc_token = $oauth->getAccessToken("https://openapi.etsy.com/v2/oauth/access_token", null, $verifier, "GET");
            } catch (OAuthException $e) {
                error_log($e->getMessage());
            }
*/
            echo 'result: <pre>' . print_r($result, true) . '</pre>';

        } elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
            $response = $etsyService->requestRequestToken();
            $extra = $response->getExtraParams();
            $url = $extra['login_url'];
            header('Location: ' . $url);
        } else {
            $url = $currentUri->getRelativeUri() . '?go=go';
            echo "<a href='$url'>Login with Etsy!</a>";
        }
     }
}
?>