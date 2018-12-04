<?php
  include("template/header.php");
  ?>
  <p class="col-11 mx-auto"><em>Noob Space, toutes l'actualitées du jeux vidéo PC.</em></p>
<div class="row col-11 mx-auto m-0 p-0">

      <div class="col-md-8 col-12 mx-auto">
          <?php foreach ($takeActuById as $actu) {
      ?>
      <h1><?php echo $actu->getName(); ?></h1>
      <p><?php echo $actu->getDescription(); ?></p>
      <p><?php echo $actu->getDate(); ?></p>
      <p class="borderbottom pb-4">Créer part: <?php echo $actu->getCreator(); ?></p>

      <form class="pt-4" action="article.php?index=<?php echo $actu->getId(); ?>&verif=true" method="post">
        <textarea name="commentary" id="" class="col-12" rows="5" placeholder="Ajouter un commentaire"></textarea>
        <input type="submit" value="Envoyer">
      </form>
      
      <?php foreach ($takeCommentaryByActuId as $commentary) {
          ?>
          <h2 class="bgth mt-4 p-2"><?php echo $commentary->getNameCommentary(); ?></h2>
          <?php if (!empty($_SESSION['admin'])) {
              if ($_SESSION['admin'] == 1) {
                  ?>
                <form action="article.php?index=<?php echo $actu->getId(); ?>&commentary=<?php echo $commentary->getId(); ?>" method="post" class="adminremove col-12 text-right">
                    <input type="hidden" name="id" value="<?php $commentary->getId(); ?>">
                    <input type="submit" value="Supprimer" class="font-weight-bold colorwhite buttonremove">
                </form>
              <?php
              }
          } ?>
          <p class="message p-2"><?php echo $commentary->getCommentary(); ?></p>
      <?php
      } ?>
  <?php
  } ?>
      </div>







      
      <?php require('template/actuality.php'); ?>
</div>
<?php
  include("template/footer.php"); ?>