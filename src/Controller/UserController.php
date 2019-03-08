<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 08/03/2019
 * Time: 09:42
 */

namespace App\Controller;


use Core\Components\AuthComponent;
use Core\Controller;
use Core\Request;

class UserController extends Controller
{
    public function index()
    {
       // $_SESSION['ConnectOK'] = true;
       // var_dump($_SESSION);

        // Si la variable existe, et qu'elle contient ce qu'il faut...
        if (AuthComponent::checkAuthenticated()) {
            $this->render('index');
        }
        else {
            $this->redirect('userLogin');
        }
    }
    /**
     *
     */

    public function login()
    {
        if (isset($_POST) && !empty($_POST)) {
            if ($_POST['email'] === "le-campus-numerique@in-the-alps.fr" && $_POST['password'] === 'LeCampusNumerique@2019') {
                AuthComponent::create();
                $this->redirect('userIndex');
            }
        }

        $this->render('login');
    }

    public function logout()
    {

        AuthComponent::delete();
        $this->redirect('userLogin');
    }

}