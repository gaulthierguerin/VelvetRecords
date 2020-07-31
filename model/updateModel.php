<?php

require_once('model/model.php');

function updateInfo() {

    if (isset($_POST['disc_id'])) {
        $disc_id = $_POST['disc_id'];
    } else {
        $disc_id = $_GET['disc_id'];
    }

    return getDiscDetails($disc_id);

}
