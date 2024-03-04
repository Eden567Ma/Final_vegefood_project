<?php $__env->startSection('contenu'); ?>
  
	  
	  <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">

             <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <div class="slider-item" style="background-image: url(../public/storage/slider_images/<?php echo e($slider->slider_image); ?>);">
				<div class="overlay"></div>
			  <div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
	
				  <div class="col-md-12 ftco-animate text-center">
					<h1 class="mb-2"><?php echo e($slider->description01); ?></h1>
					<h2 class="subheading mb-4"><?php echo e($slider->description02); ?> &amp; fruits</h2>
					<p><a href="shop" class="btn btn-primary">Voir les détails</a></p>
				  </div>
	
				</div>
			  </div>
			</div>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
		</div>
	</section>
  
	<section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
		  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services mb-md-0 mb-4">
			  <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
					<span class="flaticon-shipped"></span>
			  </div>
			  <div class="media-body">
				<h3 class="heading">Livraison Rapide</h3>
				<span>uniquement à 10 DA</span>
			  </div>
			</div>      
		  </div>
		  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services mb-md-0 mb-4">
			  <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
					<span class="flaticon-diet"></span>
			  </div>
			  <div class="media-body">
				<h3 class="heading">Toujours Frais</h3>
				<span>Produits de qualité</span>
			  </div>
			</div>    
		  </div>
		  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services mb-md-0 mb-4">
			  <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
					<span class="flaticon-award"></span>
			  </div>
			  <div class="media-body">
				<h3 class="heading">Qualité premimum</h3>
				<span>Meuilleure qualité prix</span>
			  </div>
			</div>      
		  </div>
		  <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
			<div class="media block-6 services mb-md-0 mb-4">
			  <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
					<span class="flaticon-customer-service"></span>
			  </div>
			  <div class="media-body">
				<h3 class="heading">Support</h3>
				<span>24/7 Support</span>
			  </div>
			</div>      
		  </div>
		</div>
			</div>
		</section>
  
		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>BioFood</h2>
										<p>Protège la santé de toutes les maisons</p>
										<p><a href="shop" class="btn btn-primary">Acheter </a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="shop">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="shop">Légumes</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
  
					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="shop">Jus Naturels</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="shop">Secs</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
  
	<section class="ftco-section">
		<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
		  <div class="col-md-12 heading-section text-center ftco-animate">
			  <span class="subheading">Produits</span>
			<h2 class="mb-4">Nos produits</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
		  </div>
		</div>   		
		</div> 
		<div class="container">
			<div class="row">
				<?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="../public/storage/product_images/<?php echo e($produit->product_image); ?>" alt="Colorlib Template">
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#"><?php echo e($produit->product_name); ?></a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="price-sale"><?php echo e($produit->product_price); ?> DA</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<?php if($produit->status=='1'): ?>
								<a href="ajouter_au_panier/<?php echo e($produit->id); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart"></i></span>
								</a>
								<?php elseif($produit->status=='0'): ?>
                                 <label class="badge badge-danger"> Rupture de stock </label>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				

			</div>
		</div>
		<div class="text text-center">
		<p><a href="shop" class="btn btn-primary">Voir Plus de produits </a></p>
		</div>
	</section>
		
		<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
		<div class="container">
				<div class="row justify-content-end">
		  <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
			  <span class="subheading">Meuilleur prix pour vous</span>
			
		  </div>
		</div>   		
		</div>
	</section>
  
	<section class="ftco-section testimony-section">
	  <div class="container">
		<div class="row justify-content-center mb-5 pb-3">
		  <div class="col-md-7 heading-section ftco-animate text-center">
			  <span class="subheading">Temoignages</span>
			<h2 class="mb-4">Retour de nos clients</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
		  </div>
		</div>
		<div class="row ftco-animate">
		  <div class="col-md-12">
			<div class="carousel-testimony owl-carousel">
			  <div class="item">
				<div class="testimony-wrap p-4 pb-5">
				  <div class="user-img mb-5" style="background-image: url(images/person_1.jpg)">
					<span class="quote d-flex align-items-center justify-content-center">
					  <i class="icon-quote-left"></i>
					</span>
				  </div>
				  <div class="text text-center">
					<p class="mb-5 pl-4 line">Le meuilleur vendeur de produits bio je vous le conseille ! </p>
					<p class="name">Garreth Smith</p>
					<span class="position">Top 1 des clients</span>
				  </div>
				</div>
			  </div>
			  <div class="item">
				<div class="testimony-wrap p-4 pb-5">
				  <div class="user-img mb-5" style="background-image: url(images/person_2.jpg)">
					<span class="quote d-flex align-items-center justify-content-center">
					  <i class="icon-quote-left"></i>
					</span>
				  </div>
				  <div class="text text-center">
					<p class="mb-5 pl-4 line">Livraison trés rapide et livreur vraiment Cool.</p>
					<p class="name">Jack Williams</p>
					<span class="position">Top 2 de nos clients </span>
				  </div>
				</div>
			  </div>
			  <div class="item">
				<div class="testimony-wrap p-4 pb-5">
				  <div class="user-img mb-5" style="background-image: url(images/person_3.jpg)">
					<span class="quote d-flex align-items-center justify-content-center">
					  <i class="icon-quote-left"></i>
					</span>
				  </div>
				  <div class="text text-center">
					<p class="mb-5 pl-4 line">Vos produits sont trés frais Merci a vous .</p>
					<p class="name">Allian Walker</p>
					<span class="position">Top 3 de nos clients </span>
				  </div>
				</div>
			  </div>
			  <div class="item">
				<div class="testimony-wrap p-4 pb-5">
				  <div class="user-img mb-5" style="background-image: url(images/person_5.jpg)">
					<span class="quote d-flex align-items-center justify-content-center">
					  <i class="icon-quote-left"></i>
					</span>
				  </div>
				  <div class="text text-center">
					<p class="mb-5 pl-4 line">J'achète toujours chez vous c'est un régale a chaque fois.</p>
					<p class="name">Mickel Rainbow</p>
					<span class="position">Top 4 de no clients</span>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</section>
  
	<hr>
  
		<section class="ftco-section ftco-partner">
		<div class="container">
			<div class="row">
				<div class="col-sm ftco-animate">
					<a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-sm ftco-animate">
					<a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-sm ftco-animate">
					<a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-sm ftco-animate">
					<a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
				</div>
				<div class="col-sm ftco-animate">
					<a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
				</div>
			</div>
		</div>
	</section>
  
	  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Biofood\resources\views/client/home.blade.php ENDPATH**/ ?>