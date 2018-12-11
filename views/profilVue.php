<?php
  $title = "Noob Space: Profil " . $profil->getName();
  include("template/header.php");
?>

<?php if (!empty($_SESSION['id'])) {
    if ($_SESSION['id'] == $profil->getId()) {
        ?>
    <p class="text-center sizeinfo <?php echo $colorerror ?> font-weight-bold"><?php echo $messageConnection; ?></p>
<?php
    }
} ?>

<div class="container">
    <div class="row m-y-2">
      <div class="col-lg-2 pull-lg-8 text-xs-center">
          <div class="profileavatar col-12 col-md-2">
            <p class="rounded-circle mx-auto text-center avatarprofil font-weight-bold colorwhite bgth"><?php echo substr($profil->getName(), 0, 1); ?></p>
          </div>
          </div>
        <div class="col-lg-10 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <?php if (!empty($_SESSION['id'])) {
    if ($_SESSION['id'] == $profil->getId()) {
        ?>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
    <?php
    }
} ?>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2">Profil de <?php echo $profil->getName(); ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Rang</h6>
                            <p>
                                <?php if ($profil->getAdmin() == 1) {
    echo "Administrateur";
} else {
    echo "Utilisateur";
}?>
                            </p>
                            <h6>Description</h6>
                            <p>
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser
                            </p>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <?php if ($_SESSION['id'] == $profil->getId()) {
    ?>
                <div class="tab-pane" id="edit">
                    <h4 class="m-y-2">Édition profil</h4>
                    <form action="profil.php" method="post">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label" for="mail">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" name="mail" id="mail" value="<?php echo $profil->getMail(); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label" for="lastpassword">Ancien Mot de passe</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="lastpassword" type="password" name="lastpassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label" for="password">Nouveau Mot de passe</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="password" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label" for="passwordconfirm">Confirmation Mot de passe</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="passwordconfirm" type="password" name="passwordconfirm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Annuler">
                                <input type="submit" class="btn btn-primary" name="send" value="Sauvegarder">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
} ?>
            </div>
        </div>
    </div>
</div>

<?php include("template/footer.php");
