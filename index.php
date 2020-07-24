<?php

require('controller/listController.php');
require('controller/artistController.php');
require('controller/homepageController.php');
require('controller/addControlle.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'discsList') {
        discsList();
    } else if ($_GET['action'] == 'addDisc') {
        addDisc();
    }
} else {
    home();    
}
