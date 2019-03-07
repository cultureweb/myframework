<?php

namespace App\Controller;
class TestsController extends AppController
{
    public function foo()
    {
        echo 'Hello world !';
    }

    public function bar($bar)
    {
        return $this->render('coolpage', compact('bar'));
    }

    // A vous d'implémeter la fonction !
    public function redirection($bar)
    {
        $this->redirect('testsBar', ['param'=> $bar]);
    }

}
