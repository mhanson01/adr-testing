<?php namespace Action;

use Http\Request;
use Http\Response;

abstract class Hero {

    /**
     * @var Request
     */
    protected $request;

    function __construct(Request $request)
    {
        $this->response = new Response($request);

        $this->request = $request;
    }
}