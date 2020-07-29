<?php

$title = "Velvet Records - Delete an entry";

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

<div class="container vh-h-80 mt-3 mt-md-5">
    <div class="row">
        <div class="col-12 col-md-6">
            <img class="album_cover w-100" src="assets/img/<?=$discEntry->disc_picture?>"  alt="<?=$discEntry->disc_picture?> cover">
        </div>
        <div class="col-12 col-md-6 d-flex align-items-start flex-column">
            <p class="h4 my-3 mt-md-0 mb-md-auto text-center">Are you sure you want to delete <span class="font-weight-bold"><?=$discEntry->disc_title?></span> by <span class="font-weight-bold"><?=$discEntry->artist_name?></span> ?</p>
            <a href="index.php?disc_id=<?=$discEntry->disc_id?>&action=deleteDisc" class="btn btn-lg btn-block btn-danger">Delete</a>
            <a href="index.php?disc_id=<?=$discEntry->disc_id?>&action=discDetails" class="btn btn-lg btn-block btn-secondary">Back</a>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean();
    require_once('template/template.php');
?>