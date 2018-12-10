<?php
  include("template/header.php");?>
  <p class="col-11 mx-auto"><em>Noob Space, toutes l'actualitées du jeux vidéo PC.</em></p>
<div class="row col-11 mx-auto m-0 p-0">

      <div class="col-md-8 col-12 mx-auto">

        <?php foreach ($takeActuality as $actu) {
      ?>
        <a href="article.php?index=<?php echo $actu->getId(); ?>" class="col-12 row actu m-0 p-0 pt-3 pb-3">
          <div class="col-md-3 col-12 d-flex">
            <img class="my-auto mx-auto" src="../assets/img/<?php echo $actu->getGame(); ?>.png" style="width: 100px; height: 100px;">
          </div>
          <div class="col-md-9 col-12">
            <h1><?php echo $actu->getName(); ?></h1>
            <p><?php echo substr($actu->getDescription(), 0, 180) . "..."; ?></p>
            <div class="row col-12 m-0 p-0">
              <p><?php echo $actu->getDate(); ?></p>
              <p class="ml-auto">Part: <?php echo $actu->getCreator(); ?></p>
            </div>
            <?php
            $count = 0;
      foreach ($takeCommentary as $commentary) {
          if ($commentary->getIdActu() == $actu->getId()) {
              $count = $count + 1; ?>
                          <?php
          }
      } ?>
            <div class="col-12 text-right m-0 p-0"><i class="far fa-comment colorpurple"> <?php echo $count; ?> Commentaire</i></div>
          </div>
        </a>
        <?php
  } ?>
      </div>

<?php require('template/actuality.php'); ?>

</div>
<?php
  include("template/footer.php"); ?>




<!-- $dateday = date('d-m-Y');
      setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
      $dateformat = ucfirst(strftime("%A %d %B %G", strtotime($dateday)));
      $hours = date('H:i');
      $datehours = $dateformat . " à " . $hours;
      echo $datehours; -->