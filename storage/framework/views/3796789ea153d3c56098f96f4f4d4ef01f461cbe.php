

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>สร้างข้อมูลลูกค้า</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                 
                    <div class="card-body">  
                        <form class="form theme-form" action="<?php echo e(route('admin.insert_customer')); ?>" method="POST">
                        <?php echo csrf_field(); ?>                               
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">ชื่อ-นามสกุล</label>
                                        <input class="form-control input-air-primary" name="user_fullname" id="travel1" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="cus_address">ที่อยู่</label>
                                        <textarea class="form-control input-air-primary" name="user_address" rows="5" cols=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จังหวัด</label>
                                        <select class="form-select input-air-primary" name="user_province" id="user_province">
                                            <option selected disabled>เลือกจังหวัด..</option>
                                            <?php $__currentLoopData = $province_th; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                            <option value="<?php echo e($row->name_th); ?>"> <?php echo e($row->name_th); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>    
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">เบอร์โทรติดต่อ</label>
                                        <input class="form-control input-air-primary" name="user_phone" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">วันเดินทาง</label>
                                        <input class="form-control input-air-primary digits"  type="date" name="user_datetravel">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">เส้นทาง</label>
                                        <input class="form-control input-air-primary" name="user_program" type="text">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">จำนวน</label>
                                        <input class="form-control input-air-primary" name="user_amount" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="travel1">หมายเหตุ</label>
                                        <textarea class="form-control input-air-primary" name="user_remark" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <button class="btn btn-success" type="submit">บันทึก</button>
                                <input class="btn btn-light" type="reset" value="ยกเลิก">
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/create_customer.blade.php ENDPATH**/ ?>