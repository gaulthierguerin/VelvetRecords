<?php

$title = 'Velvet Records - ' . $details->disc_title;

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
    <p class="h1">Details</p>
    <form>
        <div class="row">
            <div class="col-12">
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="<?=$details->disc_title?>" disabled>
                    </div>
                    <div class="col">
                        <label for="artist">Artist</label>
                        <input type="text" class="form-control" name="artist" value="<?=$details->artist_name?>" disabled>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="year">Year</label>
                        <input type="text" class="form-control" name="year" value="<?=$details->disc_year?>" disabled>
                    </div>
                    <div class="col">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?=$details->disc_genre?>" disabled>
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="col">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" name="label" value="<?=$details->disc_label?>" disabled>
                    </div>
                    <div class="col">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" value="<?=$details->disc_price?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-12 w-100 col-md-6 mb-2">
                        <img class="album_cover w-100 text-center" src="assets/img/<?=$details->disc_picture?>"  alt="<?=$details->disc_picture?> cover">        
                    </div>
                    <div class="col-12 col-md-6 mb-2 d-flex justify-content-center align-items-end ">
                        <button class="btn btn-info btn-lg btn-block">Modifier</button>
                        <button class="btn btn-info btn-lg btn-block mx-2">Supprimer</button>
                        <a href="index.php?action=discList" class="btn btn-info btn-lg btn-block">Retour</a>
                    </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require('template/template.php');
