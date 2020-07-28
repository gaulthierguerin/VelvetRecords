<?php $title = 'Velvet Records' ?>

<?php ob_start(); ?>

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

    <div class="container d-flex justify-content-center align-items-center vh-h-80">
        <p class="h1 welcome">Welcome on Velvet Records</p>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>