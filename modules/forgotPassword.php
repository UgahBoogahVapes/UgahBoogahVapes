<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include '../helpers/crud.php';
    require_once '../vendor/autoload.php';
    require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';

    $env = parse_ini_file('../.env');
    $sendgrid_key = $env["SENDGRID_KEY"];
    $sendgrid = new \SendGrid($sendgrid_key);
    
    if (!isset($_SESSION['email_verification'])) {
        $user_email = $_POST['email'];
        if ($crud->search("users", $user_email, ['email'])) {
            $verification_code = random_int(100000, 999999);
            // Create a new SendGrid email
            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom('ugahboogahvapes24@gmail.com', 'Ugah Boogah Vapes');
            $email->setSubject("Password Reset");
            $email->addContent("text/plain", "Your verification code: ".$verification_code);
    
            // Send the email to user
            $email->addTo($_POST['email'], $_POST['email']);
            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
                $_SESSION['email_verification'] = $verification_code;
                $_SESSION['email'] = $user_email;
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }
            header("Location: ../forgot_password.php");
        } else {
            header("Location: ../forgot_password.php?status=error");
        }
    } else {
        if ($_POST['verification_code'] == $_SESSION['email_verification']) {
            $crud->update("users", $crud->search("users", $_SESSION['email'], ['email'])[0]['id'], ['password' => $aes->encrypt($_POST['password'])]);
            unset($_SESSION["email_verification"]);
            unset($_SESSION["email"]);
            header("Location: ../login.php?status=password changed");
        } else {
            header("Location: ../forgot_password.php?status=incorrect");
        }
    }

?>