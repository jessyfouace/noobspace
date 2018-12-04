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

$title = "Noob Space: Détail Actualitées";

$bdd = Database::BDD();

$actuManager = new ActualityManager($bdd);

$takeActuById = $actuManager->getActuById($_GET['index']);
$takeCommentaryByActuId = $actuManager->getCommentaryByActuId($_GET['index']);


if (isset($_GET['verif'])) {
    if ($_GET['verif'] == "true") {
        if (isset($_POST['commentary'])) {
            if ($_POST['commentary'] !== "") {
                $takePost = htmlspecialchars(strip_tags(addslashes($_POST['commentary'])));
                $nextLineTakePost = nl2br($takePost);
                $newCommentary = new Commentary([
                    'nameCommentary' => $_SESSION['name'],
                    'commentary' => $nextLineTakePost,
                    'idActu' => $_GET['index']
                ]);
                $actuManager->addCommentary($newCommentary);
                header('location: article.php?index=' . $_GET['index'] . '');
            } else {
                header('location: article.php?index=' . $_GET['index'] . '');
            }
        }
    } else {
        header('location: article.php?index=' . $_GET['index'] . '');
    }
}

if (!empty($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1) {
        if (isset($_GET['commentary'])) {
            $idCommentary = htmlspecialchars($_GET['commentary']);
            $idIndex = htmlspecialchars($_GET['index']);
            $removeCom = $actuManager->removeCommentaryByActuId($idCommentary);
            $actuManager->removeCommentary($removeCom);
            header('location: article.php?index=' . $idIndex . '');
        }
    }
}

require "../views/articleVue.php";
