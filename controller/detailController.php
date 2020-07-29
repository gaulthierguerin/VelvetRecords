<?php 

require_once('model/detailModel.php');


function discDetails() {

    $details = getDiscDetails($_GET['disc_id']);

    require_once('view/detailView.php');

    return $details;
}
