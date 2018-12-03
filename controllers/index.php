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

$bdd = Database::BDD();

$actuManager = new ActualityManager($bdd);

if (!isset($_GET['game'])) {
    $title = "Noob Space: Toutes l'actualitées du jeu vidéo PC";
    $takeActuality = $actuManager->getActus();
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'fortnite') {
    $title = "Noob Space: Fortnite";
    $takeActuality = $actuManager->getSpecialGame('fortnite');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'leagueoflegend') {
    $title = "Noob Space: League of Legends";
    $takeActuality = $actuManager->getSpecialGame('leagueoflegend');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'fifa') {
    $title = "Noob Space: Fifa 19";
    $takeActuality = $actuManager->getSpecialGame('fifa');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'worldofwarcraft') {
    $title = "Noob Space: World Of Warcraft";
    $takeActuality = $actuManager->getSpecialGame('worldofwarcraft');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'hearthstone') {
    $title = "Noob Space: HearthStone";
    $takeActuality = $actuManager->getSpecialGame('hearthstone');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'overwatch') {
    $title = "Noob Space: Overwatch";
    $takeActuality = $actuManager->getSpecialGame('overwatch');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'starcraft') {
    $title = "Noob Space: Starcraft 2";
    $takeActuality = $actuManager->getSpecialGame('starcraft');
    $takeCommentary = $actuManager->getCommentary();
} elseif ($_GET['game'] == 'diablo') {
    $title = "Noob Space: Diablo 3";
    $takeActuality = $actuManager->getSpecialGame('diablo');
    $takeCommentary = $actuManager->getCommentary();
}

require "../views/indexVue.php";
