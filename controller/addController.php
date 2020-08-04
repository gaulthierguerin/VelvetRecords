<?php
require_once('model/addModel.php');

function presentAddView($artists, $error) {
    require ("view/addView.php");
}

function addForm(){
    $artists = artistList();
    $error = null;
    presentAddView($artists, $error);
}

function addDisc () {

    $allASCIILettersAndNumbersRegex = "/^[^<>%\$]{1,255}$/";
    $yearRegex = "/^[\d]{4}$/";
    $priceRegex = "/^[0-9]{1,4}([\,\.]{1}\d\d?)?$/";


    $db = dbConnexion();

    $request = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) 
                                        VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)");

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["title"])) { //vérification titre
            $title = test_input($_POST["title"]);
        } else {
            $error[0]= "Title is incorrect (can't contain <, >, % or $)";
        }

        if (!empty($_POST["artist"])) { //vérification artiste
            $artist_id = test_input($_POST["artist"]);
        } else {
            $error[1] = "Please select an artist.";
        }

        if (preg_match($yearRegex, $_POST["year"])) { //vérification année
            $year = test_input($_POST["year"]);
        } else {
            $error[2]= "Year is incorrect (must contain 4 digits)";
        }

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["genre"])) { //vérification genre
            $genre = test_input($_POST["genre"]);
        } else {
            $error[3] = "Genre is incorrect (can't contain <, >, % or $)";
        }

        if (preg_match($allASCIILettersAndNumbersRegex, $_POST["label"])) { //vérification label
            $label= test_input($_POST["label"]);
        } else {
            $error[4] = "Label is incorrect (can't contain <, >, % or $)";
        }

        if (preg_match($priceRegex, $_POST["price"])) { //vérification prix
            $price = test_input($_POST["price"]);
        } else {
            $error[5] = "Price is incorrect (4 integer, 2 decimals).";
        }

        if (isset($_FILES)) {
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

                $error[6] = "Unauthorized file type";
                exit;
            }

        }

        if (!isset($error)) {
            $request -> bindValue(':disc_title', $title); //lie les valeurs à leurs entrée en BDD
            $request -> bindValue(':disc_year', $year);
            $request -> bindValue(':disc_picture', $picture .".jpg");
            $request -> bindValue(':disc_label', $label);
            $request -> bindValue(':disc_genre', $genre);
            $request -> bindValue(':disc_price', $price);
            $request -> bindValue(':artist_id', $artist_id);

            $request->execute();

            header("Location: index.php?action=addSuccess");

        } else {
            $artists = artistList();
            presentAddView($artists, $error);
        }
    }

}