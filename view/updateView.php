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
    <form action="index.php?action=updateDisc" method="post">
        <input type="hidden" name="disc_id" value="<?=$discInfo->disc_id?>">
        <div class="row">
            <div class="col-12">
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="title" class="h5">Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$discInfo->disc_title?>">
                    </div>
                    <div class="col">
                        <label for="artist" class="h5">Artist</label>
                        <input type="text" class="form-control" name="artist" value="<?=$discInfo->artist_name?>">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="year" class="h5">Year</label>
                        <input type="text" class="form-control" name="year" value="<?=$discInfo->disc_year?>">
                    </div>
                    <div class="col">
                        <label for="genre" class="h5">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?=$discInfo->disc_genre?>">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="label" class="h5">Label</label>
                        <input type="text" class="form-control" name="label" value="<?=$discInfo->disc_label?>">
                    </div>
                    <div class="col">
                        <label for="price" class="h5">Price</label>
                        <input type="text" class="form-control" name="price" value="<?=$discInfo->disc_price?>">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label for="picture" class="h5">Picture</label>
                </div>
                <input type="file" name="picture" accept="image/png, image/jpeg">
            </div>
        </div>
        <div class="row">
            <div class="d-flex col-12 w-100 col-md-6 mb-2 mt-2">
                <img class="album_cover w-100 text-center" src="assets/img/<?=$discInfo->disc_picture?>"  alt="<?=$discInfo->disc_picture?> cover">

            </div>
            <div class="col-12 col-md-6 mb-2 d-flex justify-content-between align-items-end ">
                <button type="submit" class="btn btn-info btn-lg btn-block mr-1">Update</button>
                <a href="index.php?disc_id=<?=$discInfo->disc_id?>&action=discDetails" class="btn btn-info btn-lg btn-block ml-1">Back</a>
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once('template/template.php');
?>
