<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
      <?php echo $__env->yieldContent('contenu'); ?>
    

  <?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-migrate-3.0.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.easing.1.3.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.stellar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/aos.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.animateNumber.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('js/scrollax.min.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="<?php echo e(asset('js/google-map.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <?php echo $__env->yieldContent('Scripts'); ?>
    </body>
  </html><?php /**PATH C:\wamp64\www\Biofood\resources\views/layouts/app1.blade.php ENDPATH**/ ?>