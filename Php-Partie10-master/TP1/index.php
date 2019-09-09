<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="index.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

    <body class="colorBackgroundBody">

        <?php
        include "country.php";


        $graduateArray = array('sans', 'Bac', 'Bac+2', 'Bac+3', 'Supérieur');
        ?>

        <h1 class="text-center">Formulaire d'inscription à la Manu</h1>

        <?php
        $regexName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
        $regexMail = '/[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}/';
        $regexAddress = '/^([0-9a-zA-Z\,.\'àâéèêôùûçÀÂÉÈÔÙÛÇ\s-]{1,50})$/';
        $regexPhone = '/^(0|(\\\\+33)|(0033))[1-9][0-9]{8}$/';
        $regexDate = '^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$';
        $regexNumberOfBadge = '/^(100|\d{1,2})$/m';
        $regexCodecademyLink = '/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/m';
        $regexQuestion = '/^[a-zÀ-ÖØ-öø-ÿ -\'!?:A-Z0-9.#<>,;\-& \/]{5,100}$/';
        $regexPoleEmploi = '/^[0-9]{7}[A-Z]{1}$/m';

        $errorMessage = array();

        if (count($_POST) > 0) {
            if (!empty($_POST['lastname'])) {
                if (preg_match($regexName, $_POST['lastname'])) {
                    $lastname = htmlspecialchars($_POST['lastname']);
                } else {
                    $errorMessage['lastname'] = 'Votre nom de famille est incorrect.';
                }
            } else {
                $errorMessage['lastname'] = 'Merci de rentrer votre nom de famille.';
            }
            if (!empty($_POST['firstname'])) {
                if (preg_match($regexName, $_POST['firstname'])) {
                    $firstname = htmlspecialchars($_POST['firstname']);
                } else {
                    $errorMessage['firstname'] = 'Votre Prénom est incorrect.';
                }
            } else {
                $errorMessage['firstname'] = 'Merci de rentrer votre nom';
            }
            if (!empty($_POST['birthday'])) {
                if (preg_match($regexDate, $_POST['birthday'])) {
                    $birthday = htmlspecialchars($_POST['birthday']);
                } else {
                    $errorMessage['birthday'] = 'Merci de rentrer une date valide!';
                }
            } else {
                $errorMessage['birthday'] = 'Merci de rentrer votre anniversaire.';
            }
            if (!empty($_POST['countryBirth'])) {
                if (preg_match($regexName, $_POST['countryBirth'])) {
                    $countryBirthday = htmlspecialchars($_POST['countryBirth']);
                } else {
                    $errorMessage['countryBirth'] = 'Je ne comprends pas, où êtes vous venus au monde?';
                }
            } else {
                $errorMessage['countryBirth'] = 'Merci de rentrer un pays!';
            }
            if (!empty($_POST['country'])) {
                if (preg_match($regexName, $_POST['country'])) {
                    $country = htmlspecialchars($_POST['country']);
                } else {
                    $errorMessage['country'] = 'Votre nationalité n\'est pas valide!';
                }
            } else {
                $errorMessage['country'] = 'Merci de rentrer votre nationalité.';
            }
            if (!empty($_POST['address'])) {
                if (preg_match($regexAddress, $_POST['address'])) {
                    $address = htmlspecialchars($_POST['address']);
                } else {
                    $errorMessage['address'] = 'Votre adresse n\'est pas valide!';
                }
            } else {
                $errorMessage['address'] = 'Merci de rentrer votre adresse.';
            }
            if (!empty($_POST['email'])) {
                if (preg_match($regexMail, $_POST['email'])) {
                    $email = htmlspecialchars($_POST['email']);
                } else {
                    $errorMessage['email'] = 'Votre email n\'est pas valide!';
                }
            } else {
                $errorMessage['email'] = 'Merci de rentrer votre email.';
            }
            if (!empty($_POST['phoneNumber'])) {
                if (preg_match($regexPhone, $_POST['phoneNumber'])) {
                    $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                } else {
                    $errorMessage['phoneNumber'] = 'Votre numéro de téléphone n\'est pas valide!';
                }
            } else {
                $errorMessage['phoneNumber'] = 'Merci de rentrer votre numéro de téléphone.';
            }
            if (!empty($_POST['graduate'])) {
                if (isset($_POST['graduate'])) {
                    $graduate = htmlspecialchars($_POST['graduate']);
                } else {
                    $errorMessage['graduate'] = 'Votre diplome n\'est pas valide!';
                }
            } else {
                $errorMessage['graduate'] = 'Merci de rentrer votre diplome.';
            }
            if (!empty($_POST['poleEmploiNumber'])) {
                if (preg_match($regexPoleEmploi, $_POST['poleEmploiNumber'])) {
                    $poleEmploiNumber = htmlspecialchars($_POST['poleEmploiNumber']);
                } else {
                    $errorMessage['poleEmploiNumber'] = 'Votre numéro pole emploi n\'est pas valide!';
                }
            } else {
                $errorMessage['badgeNumber'] = 'Merci de rentrer votre numéro de pole emploi.';
            }
            if (!empty($_POST['badgeNumber'])) {
                if (preg_match($regexNumberOfBadge, $_POST['badgeNumber'])) {
                    $badgeNumber = htmlspecialchars($_POST['badgeNumber']);
                } else {
                    $errorMessage['badgeNumber'] = 'Votre nombre de badge n\'est pas valide!';
                }
            } else {
                $errorMessage['badgeNumber'] = 'Merci de rentrer votre nombre de badge.';
            }
            if (!empty($_POST['codeAcademy'])) {
                if (preg_match($regexCodecademyLink, $_POST['codeAcademy'])) {
                    $codeAcademy = htmlspecialchars($_POST['codeAcademy']);
                } else {
                    $errorMessage['codeAcademy'] = 'Votre URL de code academy n\'est pas valide!';
                }
            } else {
                $errorMessage['codeAcademy'] = 'Merci de rentrer une URL valide.';
            }
            if (!empty($_POST['superHero'])) {
                if (preg_match($regexQuestion, $_POST['superHero'])) {
                    $superHero = htmlspecialchars($_POST['superHero']);
                } else {
                    $errorMessage['superHero'] = 'Votre phrase n\'est pas valide!';
                }
            } else {
                $errorMessage['superHero'] = 'Merci de rentrer une phrase valide.';
            }
            if (!empty($_POST['hack'])) {
                if (preg_match($regexQuestion, $_POST['hack'])) {
                    $hack = htmlspecialchars($_POST['hack']);
                } else {
                    $errorMessage['hack'] = 'Votre phrase n\'est pas valide!';
                }
            } else {
                $errorMessage['hack'] = 'Merci de rentrer une phrase valide.';
            }
            if (!empty($_POST['experience'])) {
                if (isset($_POST['experience'])) {
                    $experience = htmlspecialchars($_POST['experience']);
                } else {
                    $errorMessage['experience'] = 'Votre phrase n\'est pas valide!';
                }
            } else {
                $errorMessage['experience'] = 'Merci de rentrer une phrase valide.';
            }
        }
        ?>

        <?php
        if (count($_POST) == 0 OR count($errorMessage) > 0) {
            ?>

            <div class="container-fluid">
                <div class="row text-center mx-auto mb-5">
                    <div class="card bg-danger col-7 mx-auto text-center">
                        <fieldset>
                            <form class="mt-5" id="inscriptionForm" method="post" action="index.php">
                                <p><label for="lastname"><b>Nom : <input type="text" name="lastname" id="lastname" class="mr-3" required /></b></label><span class="errorMessage"><?= isset($errorMessage['lastname']) ? $errorMessage['lastname'] : ''; ?></span>  
                                    <label for="firstname"><b>Prénom : <input type="text" name="firstname" id="firstname" required /></b></label><span class="errorMessage"><?= isset($errorMessage['firstname']) ? $errorMessage['firstname'] : ''; ?></span></p>
                                <p><label for="birthday"><b> Date de naissance : </b><input type="date" name="birthday" id="birthday" required /></label><span class="errorMessage"><?= isset($errorMessage['birthday']) ? $errorMessage['birthday'] : ''; ?></span></p>
                                <p><label for="countryBirth">Pays de naissance : 
                                        <select id="countryBirth" name="countryBirth" required>
                                            <?php
                                            foreach ($countryCode as $valueCountry) {
                                                ?>

                                                <option value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </label><span class="errorMessage"><?= isset($errorMessage['countryBirth']) ? $errorMessage['countryBirth'] : ''; ?></span></p>
                                <p><label for="country">Nationalité : 
                                        <select id="country" name="country" required>
                                            <?php
                                            foreach ($countryCode as $valueCountry) {
                                                ?>

                                                <option value="<?= $valueCountry; ?>"><?= $valueCountry; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </label><span class="errorMessage"><?= isset($errorMessage['country']) ? $errorMessage['country'] : ''; ?></span></p>
                                <p><label for="address">Adresse : <input type="text" id="address" name="address" required /></label><span class="errorMessage"><?= isset($errorMessage['address']) ? $errorMessage['address'] : ''; ?></span></p>
                                <p><label for="email"> Adresse Email : <input type="email" name="email" id="email" required /></label><span class="errorMessage"><?= isset($errorMessage['email']) ? $errorMessage['email'] : ''; ?></span></p>
                                <p><label for="phoneNumber">Téléphone : <input type="tel" name="phoneNumber" id="phoneNumber" required /></label><span class="errorMessage"><?= isset($errorMessage['phoneNumber']) ? $errorMessage['phoneNumber'] : ''; ?></span></p>
                                <p><label for="graduate">Diplôme : 
                                        <select id="graduate" name="graduate" required>
                                            <?php
                                            foreach ($graduateArray as $valueGraduate) {
                                                ?>

                                                <option value="<?= $valueGraduate; ?>"><?= $valueGraduate; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </label><span class="errorMessage"><?= isset($errorMessage['graduate']) ? $errorMessage['graduate'] : ''; ?></span></p>
                                <p><label for="poleEmploiNumber">Numéro pole emploi : <input type="text" id="poleEmploiNumber" name="poleEmploiNumber" required /></label><span class="errorMessage"><?= isset($errorMessage['poleEmploiNumber']) ? $errorMessage['poleEmploiNumber'] : ''; ?></span></p>
                                <p><label for="badgeNumber">Nombre de badge : <input type="number" id="badgeNumber" name="badgeNumber" value="1" min="1" required /></label><span class="errorMessage"><?= isset($errorMessage['badgeNumber']) ? $errorMessage['badgeNumber'] : ''; ?></span></p>
                                <p><label for="codeAcademy">Liens codecademy : <input type="url" id="codeAcademy" name="codeAcademy" required /></label><span class="errorMessage"><?= isset($errorMessage['codeAcademy']) ? $errorMessage['codeAcademy'] : ''; ?></span></p>
                                <p><label for="superHero">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi? <textarea id="superHero" name="superHero" required></textarea></label><span class="errorMessage"><?= isset($errorMessage['superHero']) ? $errorMessage['superHero'] : ''; ?></span></p>
                                <p><label for="hack">Racontez-nous un de vos "hacks" (pas forcément technique ou informatique)<textarea id="hack" name="hack" required></textarea></label><span class="errorMessage"><?= isset($errorMessage['hack']) ? $errorMessage['hack'] : ''; ?></span></p>
                                <p>Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?
                                    <input type="radio" name="experience" id="experienceOui" value="oui" /><label>Oui</label><span class="errorMessage"><?= isset($errorMessage['experience']) ? $errorMessage['experience'] : ''; ?></span>
                                    <input type="radio" name="experience" id="experienceNon" value="non" /><label>Non</label><span class="errorMessage"><?= isset($errorMessage['experience']) ? $errorMessage['experience'] : ''; ?></span></p>
                                <input type="submit" value="valider" />
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php } else { ?>

            <div class="container-fluid">
                <div class="row text-center mx-auto mt-3">
                    <div class="col-6 mx-auto text-left">
                        <p>Nom : <?= $_POST['lastname']; ?></p>
                        <p>Prénom : <?= $_POST['firstname']; ?></p>
                        <p>Date de naissance : <?= $_POST['birthday']; ?></p>
                        <p>Pays de naissance : <?= $_POST['countryBirth']; ?></p>
                        <p>Nationalité : <?= $_POST['country']; ?></p>
                        <p>Adresse : <?= $_POST['address']; ?></p>
                        <p>Email : <?= $_POST['email']; ?></p>
                        <p>Numéro de téléphone : <?= $_POST['phoneNumber']; ?></p>
                        <p>Diplome : <?= $_POST['graduate']; ?></p>
                        <p>Numéro pole emploi : <?= $_POST['poleEmploiNumber']; ?></p>
                        <p>Nombre de badge : <?= $_POST['badgeNumber']; ?></p>
                        <p>Lien code academy : <?= $_POST['codeAcademy']; ?></p>
                        <p>SuperHero : <?= $_POST['superHero']; ?></p>
                        <p>hack : <?= $_POST['hack']; ?></p>
                        <p>Expérience : <?= $_POST['experience']; ?></p>

                    </div>
                </div>
            </div>

        <?php } ?>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
