<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $title; ?></title>
  <meta name="description" content="Noob: space, toutes l'actualitées du jeu vidéo PC, ainsi qu'un forum dédier au jeu vidéo">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico"/>
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/normalize.css">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top" role="navigation">
    <div class="container col-12">
        <a class="navbar-brand" href="index.php"><i class="fas fa-headset"> NOOBSPACE</i></a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Actu</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Forum</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Top Jeux</a></li>
                <?php if (!empty($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 1) {
        ?>
                <li class="nav-item"><a href="#" class="nav-link">Pannel Admin</a></li>
                <?php
    }
} ?>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <?php if (empty($_SESSION['name'])) {
    ?>
                <li class="dropdown order-1">
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-user"><span> Connection</span></i></a></li>
                </li>
                <?php
} else {
        ?>
                <li class="dropdown order-1">
                    <li class="nav-item"><a class="nav-link" href="profil.php"><span> Profil</span></a></li>
                </li>
                <li class="dropdown order-1">
                    <li class="nav-item"><a class="nav-link" href="disconnect.php"><span> Se deconnecter</span></a></li>
                </li>
<?php
    } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="nav2 overflow-y-hidden col-12 mx-0 px-0 text-center bg-white">
  <b>   
      <a href="index.php?game=fortnite" class="col-4"><img src="../assets/img/fortnite.png">Fortnite</a>
      <a href="index.php?game=leagueoflegend" class="col-4"><img src="../assets/img/leagueoflegend.png">League of Legends</a>
      <a href="index.php?game=fifa" class="col-4"><img src="../assets/img/fifa.png">Fifa 19</a>
      <a href="index.php?game=worldofwarcraft" class="col-4"><img src="../assets/img/worldofwarcraft.png">World Of Warcraft</a>
      <a href="index.php?game=hearthstone" class="col-4"><img src="../assets/img/hearthstone.png">HearthStone</a>
      <a href="index.php?game=overwatch" class="col-4"><img src="../assets/img/overwatch.png">Overwatch</a>
      <a href="index.php?game=starcraft" class="col-4"><img src="../assets/img/starcraft.png">Starcraft</a>
      <a href="index.php?game=diablo" class="col-4"><img src="../assets/img/diablo.png">Diablo 3</a>
  </b>
</div>


