<?php

namespace Foodcloud\APILibrary;

class Foodcloud
{

    private $curl;
    /**
     * Create a new Foodcloud Instance
     */
    public function __construct()
    {
        //
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

}
