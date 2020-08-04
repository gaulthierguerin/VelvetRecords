<?php 

require_once('model/detailModel.php');


function discDetails() {

    $details = getDiscDetails($_GET['disc_id']); // le lien menant à ce controlleur est index.php?disc_id="*"&action=discDetails (* il est récupéré grâce à la liste)

    require_once('view/detailView.php');

    return $details;
}
