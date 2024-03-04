<html lang="en">
  <head>
    <title>BioFood - Site de vente de Produits Bio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.timepicker.css')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/icomoon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">0553 64 88 13</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">pfel3infoummto@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">LIVRAISON SOUS 3 À 5 JOURS  &amp; Retour Gratuit</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>">BioFood</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="<?php echo e(URL::to('/')); ?>" class="nav-link">Acceuil</a></li>
			  <li class="nav-item active"><a href="<?php echo e(URL::to('/shop')); ?>" class="nav-link">Magasin</a></li>
	          <li class="nav-item cta cta-colored"><a href="<?php echo e(URL::to('/panier')); ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo e(Session::has('cart')? Session::get('cart')->totalQty:0); ?>]</a></li>
              <?php if(Session::has('client')): ?>
			  <li class="nav-item active"><a href="<?php echo e(URL::to('/logout')); ?>" class="nav-link">Déconnexion</a></li>
			  <?php else: ?>
			  <li class="nav-item active"><a href="<?php echo e(URL::to('/client_login')); ?>" class="nav-link">Connexion</a></li>
			  <?php endif; ?>
	        </ul>
	      </div>
	    </div>
	  </nav><?php /**PATH C:\wamp64\www\Biofood\resources\views/include/header.blade.php ENDPATH**/ ?>