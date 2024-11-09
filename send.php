<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'akotanmahougnon@gmail.com';                     //SMTP username
        $mail->Password   = 'lcta duhg frfl xnvs';                               //SMTP password
        $mail->SMTPSecure = "tls";                                  //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('akotanmahougnon@gmail.com', 'Adolphe');
        $mail->addAddress($_POST['email']);     //Add a recipient


        //Attachments
        $mail->addAttachment($filePath);         //Add attachments

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Confirmation de votre demande";
        $mail->Body    = "Bonjour, votre demande a été prise en compte.Vous trouverez ci-joint un recapitulatif </br><b>Merci!</b>";
       

        $mail->send();
        echo 'Le message a été envoyé avec succès';
    } catch (Exception $e) {
        echo "Le message n'a pas pu envoyer. Mailer Error: {$mail->ErrorInfo}";
    }