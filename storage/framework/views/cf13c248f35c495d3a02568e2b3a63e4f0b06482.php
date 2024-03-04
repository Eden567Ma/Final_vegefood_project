<?php $__env->startSection('contenu'); ?>
    <div class="hero-wrap hero-bread" style="background-image: url('http://localhost/Biofood/public/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span> <span>Produits</span></p>
            <h1 class="mb-0 bread">Produits</h1>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 mb-5 text-center">
    <ul class="product-category">
    <li><a href="<?php echo e(URL::to('/shop')); ?>" class="<?php echo e((request()->is('shop')?'active':'')); ?>"> Tout</a></li>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li><a href="http://localhost/Biofood/public/select_par_cat/<?php echo e($categorie->category_name); ?>" class="<?php echo e((request()->is('select_par_cat/'.$categorie->category_name)?'active':'')); ?>" ><?php echo e($categorie->category_name); ?></a></li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>
</div>
         <div class="row">
        <?php $__currentLoopData = $produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-6 col-lg-3 ftco-animate">
<div class="product">
<a href="#" class="img-prod"><img class="img-fluid" src="http://localhost/Biofood/public/storage/product_images/<?php echo e($produit->product_image); ?>" >
<div class="overlay"></div>
</a>
<div class="text py-3 pb-4 px-3 text-center">
<h3><a href="#"><?php echo e($produit->product_name); ?></a></h3>
<div class="d-flex">
<div class="pricing">
<span class="price-sale"><?php echo e($produit->product_price); ?> DA</span>
</div>
</div>
<div class="bottom-area d-flex px-3">
<div class="m-auto d-flex">

<?php if($produit->status=='1'): ?>
<a href="http://localhost/Biofood/public/ajouter_au_panier/<?php echo e($produit->id); ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
<span> <i class="ion-ios-cart"> </i> </span>
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
    <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              
            </div>
          </div>
        </div>
    </div>
    </section>
	<div class="row">
		<div class="col-md-12 text-center">
		</div>
	  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Biofood\resources\views/client/shop.blade.php ENDPATH**/ ?>