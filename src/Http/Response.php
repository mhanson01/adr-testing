<?php namespace Http;

use Support\Str;

class Response {

    protected $request;

    private $isJson = false;

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function body($content)
    {
        if($this->isJson)
        {
            $content = json_encode($content);
        }

        echo $content;
    }

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

    public function json()
    {
        $this->isJson = true;

        return $this->type('application/json');
    }

    public function back()
    {
        if( Str::startsWith($this->request->referrer, 'http://localhost-router/') )
        {
            header("Location: " . $this->request->referrer);
            exit;
        }

        header("Location: http://localhost-router/");
        exit;
    }
}