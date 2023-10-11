
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ความต้องการพิเศษ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">                        
                        <?php $__currentLoopData = $travel_tip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           โปรแกรม : <?php echo e($row->package_name); ?> (<?php echo e($row->name_th); ?>)                    
                      </div>
                            <div class="card-body">
                                <form action="<?php echo e(route('admin.insert_tips')); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <input type="hidden" name="package_id" value="<?php echo e(request()->id); ?>">
                                <div class="mb-2">
                                    <label for="program_req">ความต้องการพิเศษ</label>
                                    <textarea class="form-control" id="program_req" name="program_req" rows="3"></textarea>
                                  </div>
                                  <div class="mb-2">
                                    <label for="program_remark">หมายเหตุ<span style="color: red">*</span> </label>
                                    <textarea class="form-control" id="program_remark" name="program_remark" rows="3"></textarea>
                                 
                                  </div>
  
                                  <div class="mb-2">
                                    <label for="f1-last-name">ข้อควรระวัง</label>
                                    <textarea class="form-control" id="tips_box" name="program_tips" rows="3"></textarea>
                                  </div>

                                  <div class="card-footer text-end">
                                    <button class="btn btn-primary" type="submit">บันทึก</button>
                                  </div>
                                </form>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/create_tips.blade.php ENDPATH**/ ?>