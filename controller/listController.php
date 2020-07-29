<?php

require_once('model/listModel.php');

function discsList() {

    $list = getDiscs();

    require_once('view/listView.php');
    return $list;
}

function deleteSuccess() {

    if ($_GET['action'] == 'deleteSuccess') {
        global $success = true;
    }                                   //finir message de succés !


    $list = getDiscs();

    require_once('view/listView.php');
    return $list;

}