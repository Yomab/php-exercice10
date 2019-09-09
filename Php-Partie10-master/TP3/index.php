<?php
$portrait1 = array('name' => 'Victor', 'firstname' => 'Hugo', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/5/5a/Bonnat_Hugo001z.jpg', 'description' => 'Victor Hugo est un poète, dramaturge, prosateur, romancier et dessinateur romantique français, né le 26 février 1802');
$portrait2 = array('name' => 'Jean', 'firstname' => 'de La Fontaine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/e/e1/La_Fontaine_par_Rigaud.jpg', 'description' => 'Jean de La Fontaine, né le 8 juillet 1621 à Château-Thierry et mort le 13 avril 1695 à Paris, est un poète français de grande renommée.');
$portrait3 = array('name' => 'Pierre', 'firstname' => 'Corneille', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/2/2a/Pierre_Corneille_2.jpg', 'description' => 'Pierre Corneille, né le 6 juin 16061 à Rouen et mort le 1er octobre 16842 à Paris, est un dramaturge et poète français du xviie siècle.');
$portrait4 = array('name' => 'Jean', 'firstname' => 'Racine', 'portrait' => 'http://upload.wikimedia.org/wikipedia/commons/d/d5/Jean_racine.jpg', 'description' => 'Jean Racine (La Ferté-Milon, 22 décembre 1639 – Paris, 21 avril 1699 ) est un dramaturge et poète français. ');

$portrait = array($portrait1, $portrait2, $portrait3, $portrait4);

function portrait($portrait) {
    foreach ($portrait as $value) {
        ?>

        <div class="card mb-3 text-center mx-auto bg-danger" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $value['portrait']; ?>" class="card-img" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="h3 card-title"><?= $value['name']; ?> <?= $value['firstname']; ?></h5>
                        <p class="card-text"><i><?= $value['description']; ?></i></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="index.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>TP 3 Partie 10</title>

    </head>

    <body class="colorBackgroundBody">

        <p><?= portrait($portrait); ?></p>

    </body>
</html>