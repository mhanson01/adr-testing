<?php namespace Action;

use Http\Response;

abstract class Hero {

    function __construct()
    {
        $this->response = new Response();

        //$this->run();
    }
}