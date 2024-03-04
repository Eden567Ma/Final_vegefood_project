<?php $__env->startSection('contenu'); ?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
	  <div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
			<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Acceuil</a></span> <span>Panier</span></p>
		  <h1 class="mb-0 bread">Panier</h1>
		</div>
	  </div>
	</div>
  </div>

  <section class="ftco-section ftco-cart">
		  <div class="container">
			  <div class="row">
			  <div class="col-md-12 ftco-animate">
				  <div class="cart-list">
					  <table class="table">
						  <thead class="thead-primary">
							<tr class="text-center">
							  <th>&nbsp;</th>
							  <th>&nbsp;</th>
							  <th>Nom du produit</th>
							  <th>Prix</th>
							  <th>Quantité (KG)</th>
							  <th>Total</th>
							</tr>
						  </thead>
						  <tbody>
							  <?php if(Session::has('cart')): ?>
							  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="text-center">
									  <td class="product-remove"><a href="retirer_produit/<?php echo e($product['product_id']); ?>"><span class="ion-ios-close"></span></a></td>
										
										<td class="image-prod"><div class="img" style="background-image:url(storage/product_images/<?php echo e($product['product_image']); ?>);"></div></td>
										
										<td class="product-name">
											<h3><?php echo e($product['product_name']); ?></h3>
											<p>VEGEFOODS, la qualité et la fraicheur</p>
										</td>
										
										<td class="price"><?php echo e($product['product_price']); ?> DA</td>
										<form action="<?php echo e(url('/modifier_qty/'.$product['product_id'])); ?>" method="POST">
											<?php echo e(csrf_field()); ?>

											<td class="quantity">
												<div class="input-group mb-3">
													<input type='float' name='quantity' class="quantity form-control input-number"
													value="<?php echo e($product['qty']); ?>" min="0">

											  </div>
											  <input type='submit' value='Modifier' class="btn btn-success">
											</td>
										</form>	
									  </td>
										
										<td class="total"><?php echo e($product['product_price']*$product['qty']); ?> DA</td>
									</tr><!-- END TR-->
							  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						  </tbody>
						  <?php else: ?>
						  <?php if(Session::has('status')): ?>
							<div class="alert alert-success">
							  <?php echo e(Session::get('status')); ?>

							</div>
						 <?php endif; ?>
					   <?php endif; ?>
					</table>
					</div>
			  </div>
		  </div>
		  <div class="row justify-content-end">
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
			</div>
			  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				<p><a href="<?php echo e(URL::to('/paiement')); ?>" class="btn btn-primary py-3 px-4">Passer à la caisse</a></p>
			</div>
		  </div>
		  </div>
	  </section>
<?php $__env->stopSection(); ?>
	

  
  <?php $__env->startSection('Scripts'); ?>

  <script>
	$(document).ready(function(){

	var quantitiy=0;
	   $('.quantity-right-plus').click(function(e){
			
		
			e.preventDefault();
			
			var quantity = parseInt($('#quantity').val());
			
			
				
				$('#quantity').val(quantity + 1);

			  
				
			
		});

		 $('.quantity-left-minus').click(function(e){
			
			e.preventDefault();
			
			var quantity = parseInt($('#quantity').val());
			
			
		  
				
				if(quantity>0){
				$('#quantity').val(quantity - 1);
				}
		});
		
	});
</script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Biofood\resources\views/client/cart.blade.php ENDPATH**/ ?>