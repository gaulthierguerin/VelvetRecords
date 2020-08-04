<?php

require_once('model/updateModel.php');

function presentUpdateView($details, $error){ // je passe $details et $error en paramètres, pour pouvoir les récupérer en cas d'erreurs
    require('view/updateView.php');
}

function updateForm(){
    $details = updateInfo();
    $error = null;                          //error = null pour que isset($error) renvoie false et ne produise pas d'erreur "undefined"
    presentUpdateView($details, $error);
}


function updateDisc()
{

    $db = dbConnexion();

    $allASCIILettersAndNumbersRegex = "/^[^<>%\$]{1,255}$/";
    $yearRegex = "/^[\d]{4}$/";
    $priceRegex = "/^[0-9]{1,4}([\,\.]{1}\d\d?)?$/";

    $request = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?, disc_picture = ?, disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc_id = ?");


    function test_input($data)
    {
        $data = trim($data); // retire les espaces au début et à la fin de la string
        $data = stripslashes($data); //retire les backslash pour empêcher l'échappement de caractères
        $data = htmlspecialchars($data); //converti les caractère spéciaux en code html (même si ils sont empêchés par la regex)
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $disc_id = $_POST['disc_id']; //récupéré grâce à un input type hidden dans updateView.php

        //vérification -> passage en preg_match de ma valeur POST que je nettoie grâce à ma fonction test_input()

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["title"])) { //vérification titre
            $title = test_input($_POST["title"]);
        } else {
            $error[0]= "Title is incorrect (can't contain <, >, % or $)";
        }

        if (preg_match($yearRegex, $_POST["year"])) { //vérification année
            $year = test_input($_POST["year"]);
        } else {
            $error[1]= "Year is incorrect (must contain 4 digits)";
        }

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["genre"])) { //vérification genre
            $genre = test_input($_POST["genre"]);
        } else {
            $error[2] = "Genre is incorrect (can't contain <, >, % or $)";
        }

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["label"])) { //vérification label
            $label= test_input($_POST["label"]);
        } else {
            $error[3] = "Label is incorrect (can't contain <, >, % or $)";
        }

        if (preg_match($priceRegex, $_POST["price"])) { //vérification prix
            $price = test_input($_POST["price"]);
        } else {
            $error[4] = "Price is incorrect (4 integer, 2 decimals).";
        }

        if (!empty($_POST["artist"])) { //vérification artiste
            $artist_id = test_input($_POST["artist"]);
        } else {
            $error[5] = "Please select an artist.";
        }

        if (!empty($_FILES)) {
            $picture = $_FILES;
        } else {
            $picture = null;
            $request = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?, disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc_id = ?");
        }

        if (isset($picture)) {
            // On met les types autorisés dans un tableau (ici pour une image)
                $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

            // On extrait le type du fichier via l'extension FILE_INFO
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
                finfo_close($finfo);

            if (in_array($mimetype, $aMimeTypes))
            {
                $picture = $_FILES["picture"]["name"];
                move_uploaded_file($_FILES["picture"]["tmp_name"], "assets/img/" . $picture . ".jpg");
            }
            else
            {
                // Le type n'est pas autorisé, donc ERREUR

                echo "Type de fichier non autorisé";
                exit;
            }
        }

        if (!isset($error)) {
            if (isset($picture)) {
                $request->execute([$title, $year, $picture, $label, $genre, $price, $artist_id, $disc_id]);
                header("Location: index.php?action=updateSuccess");
            } else {
                $request->execute([$title, $year, $label, $genre, $price, $artist_id, $disc_id]);
                header("Location: index.php?action=updateSuccess");
            }
        } else {
            $details = updateInfo();
            presentUpdateView($details, $error);
        }

    }

}
