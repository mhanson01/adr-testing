<?php namespace Http;

use Core\App;
use Support\Str;

class Response {

    protected $request;

    private $isJson = false;

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
        $app = App::instance();

        if( Str::startsWith($app->request->referrer, 'http://localhost-router/') )
        {
            header("Location: " . $this->request->referrer);
            exit;
        }

        header("Location: http://localhost-router/");
        exit;
    }
}