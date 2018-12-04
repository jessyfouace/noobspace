<?php
  $title = "Noob Space: Profil";
  include("template/header.php");
?>

<div class="row col-12 col-md-8 mx-auto">
    <div class="panel panel-default mt-2">
          <div class="panel-body row">
            <div class="profileavatar col-12 col-md-2">
                <p class="rounded-circle mx-auto text-center avatarprofil font-weight-bold colorwhite bgth"><?php echo substr($profil->getName(), 0, 1); ?></p>
            </div>
            <div class="profilheader col-12 col-md-10">
              <h4><?php echo $profil->getName(); ?> <small><?php if ($profil->getAdmin() == 1) {
    ?>
            Administrateur
          <?php
} else {
        ?>
            Utilisateur
          <?php
    } ?></small></h4>
              <p class="profildescription">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nostrum odio cum repellat veniam eligendi rem cumque magnam autem delectus qui.
              </p>
            </div>
          </div>
        </div>

</div>

<?php include("template/footer.php");
