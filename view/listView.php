<?php

// require ('model/model.php');

$title = 'Velvet Records - List'; // permet de changer le titre dans l'onglet

ob_start(); // démarre la mise en tampon du contenu
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
        <div class="row mt-2">
            <div class="col-10">
                <p class="h1">Discs list (<?=count($list)?>)</p> <!-- $list est undefined car non initialisée sur cette page mais dans listModel.php -->
            </div>
            <div class="col-2 d-flex justify-content-end">
                <a href="index.php?action=addForm"><button class="btn btn-info mt-2">Add</button></a>
            </div>
        </div>

        <div class="row flex-wrap">
            <?php foreach ($list as $disc){ ?>
                    <div class="col-12 col-md-3 mb-3 mt-md-2 mb-md-3">
                        <img class="album_cover w-100" src="assets/img/<?=$disc->disc_picture?>" alt="<?=$disc->disc_title?> cover"
                        title="<?=$disc->disc_title?> cover">
                    </div>  
                    <div class="col-12 col-md-3 my-md-3 d-flex align-items-start flex-column">
                        <p class="h5 font-weight-bold"><?= $disc->disc_title ?></p>
                        <p class="h6"><?=$disc->artist_name?></p>
                        <p class="h6">Label : <span class="font-weight-normal"><?=$disc->disc_label ?></span></p>
                        <p class="h6">Year : <span class="font-weight-normal"><?=$disc->disc_year ?></span></p>
                        <p class="h6">Genre : <span class="font-weight-normal"><?=$disc->disc_genre ?></span></p>
                        <a href="index.php?disc_id=<?=$disc->disc_id?>&action=discDetails" class="mt-auto mb-md-1 btn btn-info align-self-stretch align-self-md-baseline">Details</a>
                    </div>     
                <hr class="d-block d-md-none">
            <?php } ?>
        </div>
    </div>

<?php    
$content = ob_get_clean(); // récupère le contenu du tampon dans une variable pour l'afficher dans le template
require_once('template/template.php');
?>