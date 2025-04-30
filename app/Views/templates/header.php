<!DOCTYPE html>

<html lang="de">

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">

		<title><?php echo $title ?></title>
		<meta name="description" content="<?php echo $description ?>">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 

        <!-- my styles -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/stylesheet.css">

	</head>

	<body class="container-fluid">

    <header class="row">
        <h1>Blizzard - Küche</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= site_url('products/') ?>">Produkte</a>
                    <a class="nav-item nav-link" href="<?= site_url('orders/') ?>">Bestellungen</a>
                </div>
            </div>
        </nav>
	</header>
    <article class="row container-fluid">