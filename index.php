<?php

require('controller/listController.php');
require('controller/homepageController.php');
require_once('controller/addController.php');
require_once('controller/detailController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'discsList') {
        discsList();
    } else if ($_GET['action'] == 'addForm') {
        addForm();
    } else if ($_GET['action'] == 'addDisc') {
        addDisc();
    } else if ($_GET['action'] == 'discDetails') {
        discDetails();
    }
} else {
    home();    
}
