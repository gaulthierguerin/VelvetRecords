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
        <input type="hidden" name="disc_id" value="<?=$details->disc_id?>">
        <div class="row">
            <div class="col-12">
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="title" class="h5">Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$details->disc_title?>" required>
                        <p class="text-danger ml-1"><?php if (isset($error[0])){ echo $error[0]; }?></p>
                    </div>
                    <div class="col">
                        <label for="artist" class="h5">Artist</label>
                        <select name="artist" id="artist" class="form-control" id="artist" required>
                            <option value="<?=$details->artist_id?>" selected><?=$details->artist_name?></option>
                            <?php foreach ($artists as $artist) { ?>

                                <option value="<?=$artist->artist_id?>"><?=$artist->artist_name?></option>

                            <?php } ?>
                        </select>
                        <p class="text-danger ml-1"><?php if (isset($error[5])){ echo $error[5]; }?></p>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="year" class="h5">Year</label>
                        <input type="text" class="form-control" name="year" value="<?=$details->disc_year?>" required>
                        <p class="text-danger ml-1"><?php if (isset($error[1])){ echo $error[1]; }?></p>
                    </div>
                    <div class="col">
                        <label for="genre" class="h5">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?=$details->disc_genre?>" required>
                        <p class="text-danger ml-1"><?php if (isset($error[2])){ echo $error[2]; }?></p>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="label" class="h5">Label</label>
                        <input type="text" class="form-control" name="label" value="<?=$details->disc_label?>" required>
                        <p class="text-danger ml-1"><?php if (isset($error[3])){ echo $error[3]; }?></p>
                    </div>
                    <div class="col">
                        <label for="price" class="h5">Price</label>
                        <input type="text" class="form-control" name="price" value="<?=$details->disc_price?>" required>
                        <p class="text-danger ml-1"><?php if (isset($error[4])){ echo $error[4]; }?></p>
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
                <img class="album_cover w-100 text-center" src="assets/img/<?=$details->disc_picture?>"  alt="<?=$details->disc_picture?> cover">

            </div>
            <div class="col-12 col-md-6 mb-2 d-flex justify-content-between align-items-end ">
                <button type="submit" class="btn btn-info btn-lg btn-block mr-1">Update</button>
                <a href="index.php?disc_id=<?=$details->disc_id?>&action=discDetails" class="btn btn-info btn-lg btn-block ml-1">Back</a>
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once('template/template.php');
?>
