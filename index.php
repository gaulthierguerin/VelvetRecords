<?php

require_once('controller/listController.php');
require_once('controller/homepageController.php');
require_once('controller/addController.php');
require_once('controller/detailController.php');
require_once('controller/updateController.php');
require_once('controller/deleteController.php');
require_once('controller/successController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'discsList') {
        discsList();
    } else if ($_GET['action'] == 'addForm') {
        addForm();
    } else if ($_GET['action'] == 'addDisc') {
        addDisc();
    } else if ($_GET['action'] == 'discDetails') {
        discDetails();
    } else if ($_GET['action'] == 'updateForm') {
        updateForm();
    } else if ($_GET['action'] == 'updateDisc') {
        updateDisc();
    } else if ($_GET['action'] == 'deleteDiscConfirm') {
        deleteDiscConfirm();
    } else if ($_GET['action'] == 'deleteDisc') {
        deleteDisc();
    } else if ($_GET['action'] == 'deleteSuccess') {
        success();
    } else if ($_GET['action'] == 'addSuccess') {
        success();
    } else if ($_GET['action'] == 'updateSuccess') {
        success();
    }
} else {
    home();
}



