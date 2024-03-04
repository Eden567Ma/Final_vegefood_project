<?php $__env->startSection('title'); ?>
    Modifier Sliders
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenu'); ?>
<div class="main-panel">
    <div class="content-wrapper">
          <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Slider</h4>
                  <?php if(Session::has('status')): ?>
                  <div class="alert alert-success">
                    <?php echo e(Session::get('status')); ?>

                  </div>
                  <?php endif; ?>
                  <?php if(count($errors)> 0): ?>
                   <div class="alert alert-danger">
                     <ul> 
                       <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><?php echo e($error); ?></li>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                      </ul>    
                   </div>                      
                  <?php endif; ?>
                      <?php echo Form::open(['action' => 'SliderController@modifierslider', 'method' => 'POST', 'class' => 'cmxform' ,'id' => 'commentForm' , 'enctype'=> 'multipart/form-data']); ?>

                    <?php echo e(csrf_field()); ?>

                      <div class="form-group">
                          <?php echo e(Form::hidden('id', $slider->id)); ?>

                          <?php echo e(Form::label('','description01' , ['for' => 'cname'])); ?>

                          <?php echo e(Form::text('description01',$slider->description01,['class'=>'form-control', 'id'=>'cname' ])); ?>

                      </div>
                      <div class="form-group">
                        <?php echo e(Form::label('','description01' , ['for' => 'cname'])); ?>

                        <?php echo e(Form::text('description02',$slider->description02,['class'=>'form-control', 'id'=>'cname' ])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('','Image' , ['for' => 'cname'])); ?>

                        <?php echo e(Form::file('slider_image',['class'=>'form-control', 'id'=>'cname' ])); ?>

                    </div>
                      <?php echo e(Form::submit('Modifier', ['class' => 'btn btn-primary'])); ?>

                  <?php echo Form::close(); ?>

                </div>
              </div>
            </div>
          </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Biofood\resources\views/admin/editslider.blade.php ENDPATH**/ ?>