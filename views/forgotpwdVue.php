<?php
  include("template/header.php");
  if (empty($_SESSION['name'])) {
      ?>
<div class="container login-container">
    <p class="text-center sizeinfo <?php echo $colorerror ?> font-weight-bold"><?php echo $messageConnection; ?></p>
                <div class="col-md-6 mx-auto login-form-1">
                    <h3>Mot de passe oublié:</h3>
                    <form action="forgotpwd.php" method="post">
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $nicknameConnection; ?></p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Votre E-mail *" name="mail" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Envoyer" />
                        </div>
                    </form>
                </div>
            </div>
        <?php
  } else {
      header('location: index.php');
  }?>
<?php
  include("template/footer.php");
