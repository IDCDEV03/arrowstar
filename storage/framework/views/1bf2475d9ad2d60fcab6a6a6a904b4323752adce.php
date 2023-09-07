
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>New Package Tour</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>เพิ่มสถานที่ท่องเที่ยว</h5>              
            </div>


            <form class="form theme-form">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" >กรอกชื่อสถานที่ท่องเที่ยว</label>
                        <input class="form-control" type="text" >
                      </div>
                    </div>
                  </div>
                </div>
            </form>

         
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\arrow\resources\views/admin/new_package_add.blade.php ENDPATH**/ ?>