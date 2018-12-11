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
                            <label class="btnForgetPwd" for="pseudoconnection">Pseudo:</label>
                            <input id="pseudoconnection" type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordConnection; ?></p>
                        <div class="form-group">
                            <label class="btnForgetPwd" for="pwdconnection">Mot de passe:</label>
                            <input id="pwdconnection" type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Connection" />
                        </div>
                    </form>
                    <form action="forgotpwd.php" method="post">
                        <input class="btnForgetPwd" type="submit" name="forgetPwd" value="Mot de pass oublié ?">
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Inscription</h3>
                    <form action="login.php?inscription=true" method="post">
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $nicknameInscription; ?></p>
                        <div class="form-group">
                            <label class="btnForgetPwd" for="pseudo">Pseudo:</label>
                            <input id="pseudo" type="text" class="form-control" placeholder="Votre Pseudo *" name="nickname" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordInscription; ?></p>
                        <div class="form-group">
                            <label class="btnForgetPwd" for="pwd">Mot de passe:</label>
                            <input id="pwd" type="password" class="form-control" placeholder="Votre mot de passe *" name="password" required/>
                        </div>
                        <p class="<?php echo $colorerror ?> font-weight-bold"><?php echo $passwordVerifInscription; ?></p>
                        <div class="form-group">
                            <label class="btnForgetPwd" for="pwdconfirm">Confirmation mot de passe:</label>
                            <input id="pwdconfirm" type="password" class="form-control" placeholder="Confirmation de votre mot de passe *" name="confirmpassword" required/>
                        </div>
                        <div class="form-group">
                            <label class="btnForgetPwd" for="mail">Adresse e-mail:</label>
                            <input id="mail" type="email" class="form-control" placeholder="Adresse e-mail *" name="mail" required/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Inscription" />
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
