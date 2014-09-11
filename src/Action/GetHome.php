<?php  namespace Action;

class GetHome extends Hero implements Actionable {

    public function run()
    {
        $this->response->json()->output('{"foo":"bar"}');
    }
}