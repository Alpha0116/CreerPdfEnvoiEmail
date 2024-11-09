<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande de visa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="traitement.php" method="post">
        <h1>Demenade de visa</h1>
        <div class="block">
            <input type="text" name="nom" placeholder="Votre nom complet">
            <input type="email" name="email" placeholder="Votre adresse email">
            <textarea name="message" placeholder="Votre message ici"></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>