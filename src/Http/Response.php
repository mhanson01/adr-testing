<?php namespace Http;

class Response {

    public function code($code = 200)
    {
        http_response_code($code);

        return $this;
    }

    public function type($content_type = 'text/html')
    {
        header("Content-type: {$content_type}");

        return $this;
    }

    public function output($string)
    {
        echo $string;
    }

    public function json()
    {
        return $this->type('application/json');
    }
}