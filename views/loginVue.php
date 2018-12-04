<?php
  include("template/header.php");
  if (empty($_SESSION['name'])) {
      ?>
<div class="container login-container">
    <p class="text-center sizeinfo <?php echo $colorerror ?> font-weight-bold"><?php echo $messageConnection; ?></p>
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Connection</h3>
                    <form action="login.php?connection=true" method="post">
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $nicknameConnection; ?></p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordConnection; ?></p>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Connection" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="btnForgetPwd">Mot de passe oublié?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Inscription</h3>
                    <form action="login.php?inscription=true" method="post">
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $nicknameInscription; ?></p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordInscription; ?></p>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordVerifInscription; ?></p>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirmation de votre mot de passe *" name="confirmpassword" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Inscription" />
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
