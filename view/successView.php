<?php

$title = "Velvet Records - Success !";
ob_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <i class="fas fa-compact-disc mr-2"></i>Velvet<span class="text-info">Records</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php?action=discsList">List</a>
        </div>
    </div>
</nav>

<div class="container vh-h-80">
    <div class="mt-5">
        <?php
        if ($_GET['action'] == 'deleteSuccess') {
            echo "<div class='alert alert-success'>Entry has been deleted successfully !</div>";
        } else if ($_GET['action'] == 'addSuccess') {
            echo "<div class='alert alert-success'>Entry has been added successfully !</div>";
        } else if ($_GET['action'] == 'updateSuccess') {
            echo "<div class='alert alert-success'>Entry has been updated successfully !</div>";
        }
        ?>
    </div>
    <div>
        <a href="index.php?action=discsList" class="btn btn-block btn-info">Back to list</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once("template/template.php");
?>
