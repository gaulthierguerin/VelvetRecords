<?php

$title = 'Velvet Records - Add a Vinyl';

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

        <p class="h2 my-3">Add a vinyl record</p>
        <form action="index.php?action=addDisc" method="POST" enctype="multipart/form-data">
            <div class="form-group ">
                <label for="title" class="h5">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title">
                <!-- <div class="alert alert-danger mt-1" role="alert" id="alertTitle"></div> -->
            </div>
            <div class="form-group">
                <label for="artist" class="h5">Artist</label>
                <select name="artist" id="artist" class="form-control">
                    <option value="0" selected disabled>Choose an artist</option>
                    <?php foreach ($artists as $artist) { ?>

                        <option value="<?=$artist->artist_id?>"><?= $artist->artist_name?></option>

                    <?php } ?>
                </select>
            </div>
            <div class="form-group ">
                <label for="year" class="h5">Year</label>
                <input type="text" name="year" class="form-control" placeholder="Enter year">
                <!-- <div class="alert alert-danger mt-1" role="alert" id="alertYear"></div> -->

            </div>
            <div class="form-group ">
                <label for="genre" class="h5">Genre</label>
                <input type="text" name="genre" class="form-control" placeholder="Enter genre (Rock, Pop, Prog ...)">
                <!-- <div class="alert alert-danger mt-1" role="alert" id="alertGenre"></div> -->


            </div>
            <div class="form-group ">
                <label for="label" class="h5">Label</label>
                <input type="text" name="label" class="form-control" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale ...)">
                <!-- <div class="alert alert-danger mt-1" role="alert" id="alertLabel"></div> -->


            </div>
            <div class="form-group ">
                <label for="price" class="h5">Price</label>
                <input type="text" name="price" class="form-control">
                <!-- <div class="alert alert-danger mt-1" role="alert" id="alertPrice"></div> -->


            </div>
            <div class="form-group mb-0">
                <label for="picture" class="h5">Picture</label>
            </div>
            <input type="file" name="picture" accept="image/png, image/jpeg">
            <!-- <div class="alert alert-danger mt-1" role="alert" id="alertPicture"></div> -->

            <div class="mt-3">
                <button type="submit" class="btn btn-info">Add</button>
                <a href="index.php?action=discsList" class="btn btn-info">Back</a>
            </div>
        </form>

    </div>

<?php

$content = ob_get_clean();
require('template/template.php');

?>