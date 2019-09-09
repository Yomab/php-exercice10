<?php
$regexName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$regexSociety = '/^([a-zA-Z0-9À-ÖØ-öø-ÿ]+)([- ]{1}[a-zA-Z0-9À-ÖØ-öø-ÿ]+){0,15}$/';
$regexAge = '/^[0-9]+$/';
$regexCivility = '/^Mr|Mme/';

$errorMessage = [];

if (count($_POST) > 0) {
    if (!empty($_POST['civility'])) {
        if (preg_match($regexCivility, $_POST['civility']))
            $civility = htmlspecialchars($_POST['civility']);
    } else {
        $errorMessage['civility'] = 'Votre civilité est invalide!';
    }
if (!empty($_POST['lastname'])) {
    if (preg_match($regexName, $_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $errorMessage['lastname'] = 'Votre nom de famille est invalide!';
    }
} else {
    $errorMessage['lastname'] = 'Merci de remplir le champ!';
}
if (!empty($_POST['firstname'])) {
    if (preg_match($regexName, $_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $errorMessage['firstname'] = 'Votre prénom est invalide!';
    }
} else {
    $errorMessage['firstname'] = 'Merci de remplir le champ!';
}
if (!empty($_POST['age'])) {
    if (preg_match($regexAge, $_POST['age'])) {
        $age = htmlspecialchars($_POST['age']);
    } else {
        $errorMessage['age'] = 'Votre age est invalide!';
    }
} else {
    $errorMessage['age'] = 'Merci de remplir le champ!';
}
if (!empty($_POST['society'])) {
    if (preg_match($regexSociety, $_POST['society'])) {
        $society = htmlspecialchars($_POST['society']);
    } else {
        $errorMessage['society'] = 'Votre société est invalide!';
    }
} else {
    $errorMessage['society'] = 'Merci de remplir le champ!';
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

        <title>TP 2, Partie 10</title>

    </head>

    <body class="colorBackgroundBody">

        <div class="text-center">
            <h1>TP 2, PARTIE 10</h1>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-6 mx-auto text-left mt-3">
                    <form class="myForm" method="post" action="index.php">
                        <p><label>Civilité : <select name="civility">
                                    <option value="Mr" <?= isset($_POST['civility']) && $_POST['civility'] == 'Mr' ? 'selected' : '' ?>>Mr</option>
                                    <option value="Mme"<?= isset($_POST['civility']) && $_POST['civility'] == 'Mme' ? 'selected' : '' ?>>Mme</option>
                                </select></label></p>
                        <p><label for="lastname">Nom : <input type="text" name="lastname" value="<?= $_POST['lastname']; ?>" id="lastname" required /></label><span><?= isset($errorMessage['lastname']) ? $errorMessage['lastname'] : ''; ?></span></p>
                        <p><label for="firstname">Prénom : <input type="text" name="firstname" value="<?= $_POST['firstname']; ?>" id="firstname" required /></label><span><?= isset($errorMessage['firstname']) ? $errorMessage['firstname'] : ''; ?></span></p>
                        <p><label for="age">Age : <input type="number" name="age" id="age" min="1" value="<?= $_POST['age']; ?>" max="100" required /></label><span><?= isset($errorMessage['age']) ? $errorMessage['age'] : ''; ?></span></p>
                        <p><label for="society">Société : <input type="text" name="society" id="society" value="<?= $_POST['society']; ?>" required /></label><span><?= isset($errorMessage['society']) ? $errorMessage['society'] : ''; ?></span></p>
                        <input type="submit" class="btn btn-danger" value="valider" />
                    </form>
                </div>
            </div>
        </div>



        <?php if (count($_POST) > 0 and count($errorMessage) == 0) { ?> {


            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mx-auto text-left mt-3">
                        <p>Votre civilité est <?= $_POST['civility']; ?> 
                        <p>Votre nom est : <?= $_POST['lastname']; ?>!</p>
                        <p>Votre prénom est : <?= $_POST['firstname']; ?>!</p>
                        <p>Votre age est de <?= $_POST['age']; ?> ans!</p>
                        <p>Vous travaillez dans cette société : <?= $_POST['society']; ?>!</p>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
