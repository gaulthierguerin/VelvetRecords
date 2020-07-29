<?php
require_once('model/addModel.php');

function addDisc () {

    $db = dbConnexion();

    $request = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) 
                                        VALUES (:disc_title, :disc_year, :disc_picture, :disc_label, :disc_genre, :disc_price, :artist_id)");

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $tabProduct = [
        "title" => array("Le titre est incorrect", "/^(\w+\D){1,6}$/"),
        "year" => array("L'année est incorrect", "/^(19|20)\d{2}$/"),
        "genre" => array("Le genre est incorrect", "/^(\w+\D){1,6}$/"),
        "label" => array("Le label est incorrect", "/^(\w+\D){1,6}$/"),
        "price" => array("Le prix est incorrect", "/^[1-9]+[0-9]*[.,]?[0-9]{0,2}$/"),
    ];

    $tabError = [];



    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = test_input($_POST["title"]);
        $year = test_input($_POST["year"]);
        $picture = $_FILES;
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

        //// On met les types autorisés dans un tableau (ici pour une image)
        //$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        //// On extrait le type du fichier via l'extension FILE_INFO
        //$finfo = finfo_open(FILEINFO_MIME_TYPE);
        //$mimetype = finfo_file($finfo, $_FILES[$picture]["tmp"]);
        //finfo_close($finfo);

        //if (in_array($mimetype, $aMimeTypes))
        //{
        //    move_uploaded_file($_FILES["pictures"]["tmp"], "assets/img/" . $picture['name'] . ".jpg");
        //}
        //else
        //{

        //// Le type n'est pas autorisé, donc ERREUR

        //echo "Type de fichier non autorisé";
        //exit;
        //}

        $request -> bindValue(':disc_title', $title); //lie les valeurs à leurs entrée en BDD
        $request -> bindValue(':disc_year', $year);
        $request -> bindValue(':disc_picture', $picture[0]);
        $request -> bindValue(':disc_label', $label);
        $request -> bindValue(':disc_genre', $genre);
        $request -> bindValue(':disc_price', $price);
        $request -> bindValue(':artist_id', $id);

        $request->execute();

    }

}