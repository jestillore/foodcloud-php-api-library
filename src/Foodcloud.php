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

    /**
     * Start Setters/Getters
     */
    private function getUrl($path) {
        return $this->endpoint . $path;
    }
    public function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;
        return $this;
    }
    public function getAccessToken() {
        return $this->accessToken;
    }
    public function setEndpoint($endpoint) {
        $this->endpoint = $endpoint;
        return $this;
    }
    public function getEndpoint() {
        return $this->endpoint;
    }
    public function getClientId() {
        return $this->clientId;
    }
    public function setClientId($clientId) {
        $this->clientId = $clientId;
        return $this;
    }
    public function getClientSecret() {
        return $this->clientSecret;
    }
    public function setClientSecret($clientSecret) {
        $this->clientSecret = $clientSecret;
        return $this;
    }
    public function getGrantType() {
        return $this->grantType;
    }
    public function setGrantType($grantType) {
        $this->grantType = $grantType;
        return $this;
    }
    /**
     * End Setters/Getters
     */

    private function request($method, $url, $data = []) {
        $c = $this->curl->newRequest($method, $url, $data);
        $c->setHeader('Authorization', $this->getAccessToken());
        $res = $c->send();

        $response = new Response;
        $response->setSuccess($res->statusCode == 200);
        $response->setStatus($res->statusCode);
        $response->setData($res->body);

        return $response;
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
        return $this->request('post', $this->getUrl('/oauth/access_token'), [
            'grant_type' => $this->grantType,
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'username' => $username,
            'password' => $password
            ]);
    }

    public function getProfile() {
        return $this->request('get', $this->getUrl('/profile'));
    }

}
