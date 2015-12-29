<?php

namespace Foodcloud\APILibrary;

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
        $this->clientId = config('foodcloud.client_id');
        $this->clientSecret = config('foodcloud.client_secret');
        $this->grantType = config('foodcloud.grant_type');
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
        
    }

}
