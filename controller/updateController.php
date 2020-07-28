<?php

require('model/updateModel.php');

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

        $title = test_input($_POST["title"]);
        $year = test_input($_POST["year"]);
        $picture = test_input($_POST["picture"]);
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
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // On extrait le type du fichier via l'extension FILE_INFO
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES[$picture]["tmp"]);
        finfo_close($finfo);

        if (in_array($mimetype, $aMimeTypes)) {
            move_uploaded_file($_FILES[$picture]["tmp"], "assets/img/" . $picture . ".jpg");
        } else {

            // Le type n'est pas autorisé, donc ERREUR

            echo "Type de fichier non autorisé";
            exit;
        }

        $request->bindValue(':disc_title', $title); //lie les valeurs à leurs entrée en BDD
        $request->bindValue(':disc_year', $year);
        $request->bindValue(':disc_picture', $picture);
        $request->bindValue(':disc_label', $label);
        $request->bindValue(':disc_genre', $genre);
        $request->bindValue(':disc_price', $price);
        $request->bindValue(':artist_id', $id);

        $request->execute([$title, $year, $picture, $label, $genre, $price, $id]);

    }

}
