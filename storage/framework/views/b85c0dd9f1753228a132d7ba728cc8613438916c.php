<?php $__env->startSection('title'); ?>
    Sliders
<?php $__env->stopSection(); ?>
<?php echo e(Form::hidden('',$increment=1)); ?>

<?php $__env->startSection('contenu'); ?>
<div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>
          <?php if(Session::has('status')): ?>
          <div class="alert alert-success">
            <?php echo e(Session::get('status')); ?>

          </div>
  <?php endif; ?>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Description one</th>
                        <th> Description two </th>
                        <th> Status </th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($increment); ?></td>
                        <td><img src="../public/storage/slider_images/<?php echo e($slider->slider_image); ?>" alt=""></td>
                        <td><?php echo e($slider->description01); ?></td>
                        <td><?php echo e($slider->description02); ?></td>
                        <td>
                          <?php if($slider->status == 1): ?>
                            <label class="badge badge-success">Activé</label>
                          <?php else: ?> 
                            <label class="badge badge-danger">Désactivé</label>
                          <?php endif; ?> 
                      </td>
                      <td>
                          <button class="btn btn-outline-primary" onclick="window.location='<?php echo e(url('/edit_slider/'.$slider->id)); ?>'">Edit</button>
                          <a href="<?php echo e(url('/supprimerslider/'.$slider->id)); ?>" id="delete" class="btn btn-outline-danger"> Delete</a>
                          <?php if($slider->status==1): ?>
                          <button class="btn btn-outline-warning" onclick="window.location='<?php echo e(url('/desactiver_slider/'.$slider->id)); ?>'">Désactiver</button>
                          <?php else: ?>
                          <button class="btn btn-outline-secondary" onclick="window.location='<?php echo e(url('/activer_slider/'.$slider->id)); ?>'">Activer</button> 
                          <?php endif; ?>
                      </td> 
                     </tr>
                      <?php echo e(Form::hidden('',$increment=$increment + 1)); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="backend/js/data-table.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Biofood\resources\views/admin/sliders.blade.php ENDPATH**/ ?>