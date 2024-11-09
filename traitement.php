<?php
    // var_dump($_POST);
    // exit();

    require'vendor/autoload.php';

    //les namespaces utilisés
    use Dompdf\Dompdf;
    use Dompdf\Options;

    //configurations Dompdf
    $options = new options();
    $options->set("isHTML5ParserEnabled",true);
    $options->set("isRemotedEnabled",true);

    //on crée un object dompdf
    $dompdf = new Dompdf($options);

    //on definit le contenu httml/css qui va représenter notre pdf
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Récapiculatif du formulaire</title>
        <style>
            body{
                background-color: #f4f4f4;
                font-family: Arial, Helvetica, sans-serif;
            }
            .container{
                width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 100px 20px;
            }
            .titre{
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 20px;
            }
            .contenu{
                margin-top: 20px;
            }
            footer{
                text-align: center;
                padding: 20px;
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="titre">Récapiculatif de votre formulaire</h1>
            <div class="contenu">
                <p>Nom: '.$_POST['nom'].'</p>
                <p>Email: '.$_POST['email'].'</p>
                <p>Message: '.$_POST['message'].' </p>
            </div>
            <footer>Visa carte, copyright &copy; 2024</footer>
        </div>
    </body>
    </html>
    ';
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4",'landscape');
    $dompdf->render();

    //Output the generated PDF to Browser
    $dompdf->stream();
    $pdfoutput = $dompdf->output();
    $filePath = "formulaire_recap.pdf";

    file_put_contents($filePath,$pdfoutput);
    include"send.php";
?>