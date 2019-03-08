<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 08/03/2019
 * Time: 11:32
 */

namespace Core\Components;


class AuthComponent
{
    public static function checkAuthenticated()
    {
        if (isset($_SESSION['ConnectOK']) && ($_SESSION['ConnectOK'] === true))
            return true;
        else
            return false;

//        if(Connexion($_POST['Pseudo'], $MotDePasse)) // on vérifie que les identifiants sont bons
//        {
//            $_SESSION['Pseudo'] = $_POST['Pseudo'];  // Je stocke dans le tableau, un champ "Pseudo", avec le pseudo à l'intérieur
//            $_SESSION['ConnectOK'] = true; // Statut de connexion à "Ok"
//            header("Location:index.php"); // redirection vers la page d'accueil, ou un espace perso...
//        }

    }
    public static function create()
    {
        $_SESSION['ConnectOK'] = true;
    }

    public static function delete()
    {
        unset($_SESSION['ConnectOK']);
    }

}