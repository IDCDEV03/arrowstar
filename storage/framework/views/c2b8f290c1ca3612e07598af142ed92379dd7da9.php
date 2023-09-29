
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>เพิ่มโปรแกรมทัวร์ใหม่</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <b><?php echo e(session('success')); ?></b>
                    </div>
                    <?php endif; ?>
                    <form class="form theme-form" 
                    action="<?php echo e(route('admin.save_program')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $province_th; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">จังหวัด</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="province_id" 
                                                value="<?php echo e($row->id); ?>">
                                           
                                                <div class="form-control-static">
                                                    <?php echo e($row->name_th); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="package_name">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-md-6">
                                                <label class="form-label" for="package_day">จำนวนวัน</label>
                                                <input class="form-control" id="package_day" type="number" name="package_day" required>
                                                <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                              </div>
                                              <div class="col-md-6">
                                                <label class="form-label" for="package_night">จำนวนคืน</label>
                                                <input class="form-control" id="package_night" type="number" name="package_night" required>
                                                <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                              </div>
                                          </div>                                       
                                    </div>
                                </div>
                             
                                <hr>
                                <button type="submit" class="btn btn-success">บันทึก</button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/new_package.blade.php ENDPATH**/ ?>