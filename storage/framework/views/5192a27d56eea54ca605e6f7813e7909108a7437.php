
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
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
                    
                    <form class="form theme-form" action="<?php echo e(route('admin.save_program_oversea',['id'=>request()->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ประเทศ</label>
                                        <div class="col-sm-9">
                                            <select class="js-example-basic-single col-sm-12" name="country_id">
                                                <option selected disabled>เลือกประเทศ..</option>
                                                <?php $__currentLoopData = $country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->rec); ?>"><?php echo e($item->ct_nameTHA); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">เมือง</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="city_name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="package_name" required>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <label class="form-label" for="package_day">จำนวนวัน</label>
                                            <input class="form-control" id="package_day" type="number" name="package_day"
                                                required>
                                            <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="package_night">จำนวนคืน</label>
                                            <input class="form-control" id="package_night" type="number"
                                                name="package_night" required>
                                            <small class="form-text text-muted">ระบุเป็นตัวเลข</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-success">บันทึก</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/new_package_oversea.blade.php ENDPATH**/ ?>