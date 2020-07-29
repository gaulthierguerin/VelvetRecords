<?php

require_once('model/updateModel.php');

function updateDisc()
{

    $db = dbConnexion();

    $request = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?, disc_picture = ?, disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc_id = ?");


    function test_input($data)
    {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $disc_id = $_POST['disc_id'];
        $title = test_input($_POST["title"]);
        $year = test_input($_POST["year"]);
        if (!empty($_POST["picture"])) {
          $picture = $_FILES;
        } else {
            $picture = null;
            $request = $db->prepare("UPDATE disc SET disc_title = ?, disc_year = ?, disc_label = ?, disc_genre = ?, disc_price = ?, artist_id = ? WHERE disc_id = ?");
        }
        $genre = test_input($_POST["genre"]);
        $label = test_input($_POST["label"]);
        $price = test_input($_POST["price"]);
        $id = test_input($_POST["artist"]);

        var_dump($title);
        var_dump($year);
        var_dump($picture);
        var_dump($label);
        var_dump($genre);
        var_dump($price);
        var_dump($id);

        // On met les types autorisés dans un tableau (ici pour une image)
        //$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // On extrait le type du fichier via l'extension FILE_INFO
        //$finfo = finfo_open(FILEINFO_MIME_TYPE);
        //$mimetype = finfo_file($finfo, $_FILES[$picture]["tmp"]);
        //finfo_close($finfo);

        //if (in_array($mimetype, $aMimeTypes)) {
        //    move_uploaded_file($_FILES[$picture]["tmp"], "assets/img/" . $picture . ".jpg");
        //} else {
        //
        //     Le type n'est pas autorisé, donc ERREUR
        //
        //    echo "Type de fichier non autorisé";
        //    exit;
        //}


        if (!empty($_POST["picture"])) {
            $request->execute([$title, $year, $picture, $label, $genre, $price, $id, $disc_id]);
        } else {
            $request->execute([$title, $year, $label, $genre, $price, $id, $disc_id]);
        }

    }

}
