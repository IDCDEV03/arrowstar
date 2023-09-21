
<?php $__env->startSection('title', 'สถานที่ท่องเที่ยว'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">         
                    
            <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                 <?php endif; ?>
<?php $__currentLoopData = $data_travel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                 <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">ชื่อสถานที่ท่องเที่ยว</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   <?php echo e($item->travel_name); ?>

                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   <?php echo e($item->name_th); ?>

                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label pt-0">รายละเอียดสถานที่ท่องเที่ยว</label>
                    <div class="col-sm-9">
                      <div class="form-control-static">
                   <?php echo $item->travel_detail; ?> 
                      </div>
                    </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <label class="col-sm-3 col-form-label pt-0">ภาพสถานที่ท่องเที่ยว</label>



                  <div class="row">
                    <?php $__currentLoopData = $travel_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm">
<img src="<?php echo e(asset('travel_img/'.$row->travel_img)); ?>" class="img-fluid img-thumbnail" width="300px" alt="">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                  </div>


            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IDDRIVES\Documents\GitHub\arrowstar\resources\views/admin/travel_detail.blade.php ENDPATH**/ ?>