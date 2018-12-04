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

require('../views/profilVue.php');
