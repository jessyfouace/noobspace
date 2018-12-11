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

$title = "Noob Space: Mot de passe oublié";

$bdd = Database::BDD();

$userManager = new UserManager($bdd);

if (isset($_POST['nickname'])) {
    if (isset($_POST['mail'])) {
        $name = htmlspecialchars($_POST['nickname']);
        $mail = htmlspecialchars($_POST['mail']);
        $user = new User([
            'name' => $name,
            'mail' => $mail
        ]);
        $verifUser = $userManager->verifUser($user);
        if ($verifUser) {
            if ($verifUser->getMail() == $mail) {
                $bytes = random_bytes(8);
                $token = bin2hex($bytes);

                $recipients = [$verifUser->getMail()];
                $bond = uniqid('np');

                $to = implode(',', $recipients);

                $subject = '[NOOBSPACE] Mot de passe oublié';

                $message = '
                        <html>
                        <head>
                        </head>
                        <body>
                        <p>Bonjour'.' '.$name.'</p>
                        <p>Suite à la demande de changement de mot de passe nous vous envoyons un mot de passe temporaire.</p>
                        <p>Mot de passe:</p>
                        <p>'.' '.$token.' '.'</p>
                        <p>Ne partagez en aucun cas ce mot de passe.</p>
                        <p>Cordialement, l\'équipe de Noob Space.</p>
                        </body>
                        </html>
                        ';

                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // En-têtes additionnels
                $headers[] = 'From: Noob Space <noreply@noobspace.fr>';
                $user = new User([
                    'name' => $verifUser->getName(),
                    'mail' => $verifUser->getMail(),
                    'password' => password_hash($token, PASSWORD_DEFAULT)
                ]);
                $userManager->forgotPassword($user);
                mail($to, $subject, $message, implode("\r\n", $headers));
            }
        }
    }
}

require '../views/forgotpwdVue.php';
