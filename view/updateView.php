<?php

$title = 'Velvet Records - Edit a disc';

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

<div class="container">
    <p class="h1 mt-2">Details</p>
    <form>
        <div class="row">
            <div class="col-12">
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$discInfo->disc_title?>">
                    </div>
                    <div class="col">
                        <label for="artist">Artist</label>
                        <input type="text" class="form-control" name="artist" value="<?=$discInfo->artist_name?>">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" name="year" value="<?=$discInfo->disc_year?>">
                    </div>
                    <div class="col">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?=$discInfo->disc_genre?>">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" name="label" value="<?=$discInfo->disc_label?>">
                    </div>
                    <div class="col">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" value="<?=$discInfo->disc_price?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 w-100 col-md-6 mb-2 mt-2">
                <img class="album_cover w-100 text-center" src="assets/img/<?=$discInfo->disc_picture?>"  alt="<?=$discInfo->disc_picture?> cover">
            </div>
            <div class="col-12 col-md-6 mb-2 d-flex justify-content-between align-items-end ">
                <a href="index.php?disc_id=<?=$discInfo->disc_id?>&action=updateDisc" class="btn btn-info btn-lg btn-block mr-1">Update</a>
                <a href="index.php?disc_id=<?=$discInfo->disc_id?>&action=discDetails" class="btn btn-info btn-lg btn-block ml-1">Back</a>
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require('template/template.php');
?>
