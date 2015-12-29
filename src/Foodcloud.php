<?php

namespace Foodcloud\APILibrary;

use anlutro\cURL\cURL;

class Foodcloud
{

    private $curl;

    private $accessToken;

    /**
     * values are set in the config file
     */
    private $endpoint;
    private $clientId;
    private $clientSecret;
    private $grantType;

    /**
     * Create a new Foodcloud Instance
     */
    public function __construct()
    {
        $this->endpoint = config('foodcloud.endpoint');
        if ($this->endpoint[strlen($this->endpoint) - 1] == '/') {
            $this->endpoint = substr($this->endpoint, 0, strlen($this->endpoint) - 1);
        }
        $this->clientId = config('foodcloud.client_id');
        $this->clientSecret = config('foodcloud.client_secret');
        $this->grantType = config('foodcloud.grant_type');

        $this->curl = new cURL;
    }

    private function getUrl($path) {
        return $this->endpoint . $path;
    }

    /**
     * Friendly welcome
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function echoPhrase($phrase)
    {
        return $phrase;
    }

    public function login($username, $password) {
        $res = $this->curl->post($this->getUrl('/oauth/access_token'), [
            'grant_type' => $this->grantType,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'username' => $username,
            'password' => $password
            ]);

        return json_decode($res);
    }

}
