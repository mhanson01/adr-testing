<?php  namespace Action;

class GetHome extends Hero implements Actionable {

    public function run()
    {
        $this->response->body('<a href="/test">test link</a>');
    }
}