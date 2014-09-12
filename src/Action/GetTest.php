<?php  namespace Action;

class GetTest extends Hero implements Actionable {

    public function run()
    {
        $this->response->back();
        //$this->response->body('{"foo":"bar"}');
    }
}