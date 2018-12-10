<?php

function chargerClasse($classname)
{
    if (file_exists('../model/'. ucfirst($classname).'.php')) {
        require '../model/'. ucfirst($classname).'.php';
    } elseif (file_exists('../entities/'. ucfirst($classname).'.php')) {
        require '../entities/'. ucfirst($classname).'.php';
    } elseif (file_exists('../traits/'. ucfirst($classname).'.php')) {
        require '../traits/'. ucfirst($classname).'.php';
    } else {
        require '../interface/'. ucfirst($classname).'.php';
    }
}
spl_autoload_register('chargerClasse');

session_start();

$bdd = Database::BDD();
$userManager = new UserManager($bdd);

if (isset($_GET['name'])) {
    $takeId = htmlspecialchars($_GET['name']);
    $profil = $userManager->getUserByName($takeId);
    if ($profil) {
        echo "";
    } else {
        header('location: index.php');
    }
} else {
    if (!empty($_SESSION['name'])) {
        $takeId = htmlspecialchars($_SESSION['name']);
        $profil = $userManager->getUserByName($takeId);
        if ($profil) {
            echo "";
        } else {
            header('location: index.php');
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_POST['send'])) {
    if (isset($_POST['password'])) {
        if (!empty($_POST['password'])) {
            if (isset($_POST['passwordconfirm'])) {
                if (!empty($_POST['passwordconfirm'])) {
                    if (isset($_POST['lastpassword'])) {
                        if (!empty($_POST['lastpassword'])) {
                            if ($_POST['password'] == $_POST['passwordconfirm']) {
                                $password = htmlspecialchars($_POST['password']);
                                $passwordconfirm = htmlspecialchars($_POST['passwordconfirm']);
                                $lastpassword = htmlspecialchars($_POST['lastpassword']);
                                $profilUpdate = $userManager->getUserByName($_SESSION['name']);
                                $verifypassword = password_verify($lastpassword, $profilUpdate->getPassword());
                                if ($verifypassword) {
                                    $messageConnection = "Mot de passe modifier.";
                                    $colorerror = "colorgreen";
                                    $newpassword = password_hash($password, PASSWORD_DEFAULT);
                                    $user = new User([
                                        'name' => $_SESSION['name'],
                                        'password' => $newpassword
                                    ]);
                                    $userManager->forgotPassword($user);
                                    header("Refresh: 1.5; url=profil.php");
                                } else {
                                    $messageConnection = "Ancien mot de passe incorrect.";
                                    $colorerror = "colorred";
                                }
                            } else {
                                $messageConnection = "Les mot de passes ne sont pas identiques.";
                                $colorerror = "colorred";
                            }
                        } else {
                            $messageConnection = "Ancien mot de passe non valide.";
                            $colorerror = "colorred";
                        }
                    } else {
                        $messageConnection = "Ancien mot de passe non valide.";
                        $colorerror = "colorred";
                    }
                } else {
                    $messageConnection = "Erreur sur la confirmation du mot de passe.";
                    $colorerror = "colorred";
                }
            } else {
                $messageConnection = "Erreur sur la confirmation du mot de passe.";
                $colorerror = "colorred";
            }
        }
    }
    if (isset($_POST['mail'])) {
        if (preg_match("#[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $profilUpdate = $userManager->getUserByName($_SESSION['name']);
            $user = new User([
                'name' => $_SESSION['name'],
                'mail' => $mail
            ]);
            $userManager->changeMail($user);
        }
    }
    // header('location: profil.php');
}

require('../views/profilVue.php');
