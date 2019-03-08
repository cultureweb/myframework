<?php

namespace App\Controller;
use Core\Controller;

class TestsController extends Controller
{
    public function foo()
    {
        echo 'Hello world !';
    }

    public function category($bar)
    {
      $this->render('coolpage', compact('bar'));
    }

    // A vous d'implémeter la fonction !
    public function redirection($bar)
    {
        $this->redirect('testsBar', ['param'=> $bar]);
    }

}
