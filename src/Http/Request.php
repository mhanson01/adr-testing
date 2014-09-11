<?php namespace Http;

class Request {

    function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];

        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->headers = getallheaders();
    }

}