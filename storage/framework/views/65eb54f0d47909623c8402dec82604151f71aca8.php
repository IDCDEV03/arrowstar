

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>แก้ไขข้อมูลลูกค้า</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">

         <div class="card">    
          <form class="form theme-form" action="<?php echo e(route('admin.update_customer')); ?>" method="POST" >
              <?php echo csrf_field(); ?>
           <?php $__currentLoopData = $data_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            <input type="hidden" name="user_id" value="<?php echo e(request()->id); ?>">
            <div class="card-body">   
            
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">ชื่อ-นามสกุล</label>
                            <input class="form-control input-air-primary" name="user_fullname" id="travel1" type="text" value="<?php echo e($list->user_fullname); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="cus_address">ที่อยู่</label>
                            <textarea class="form-control input-air-primary" name="user_address" rows="5" cols=""><?php echo e($list->user_address); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">จังหวัด</label>
                            <select class="form-select input-air-primary" name="user_province" id="user_province">
                                <option selected value="<?php echo e($list->user_province); ?>">-<?php echo e($list->user_province); ?></option>
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
                            <input class="form-control input-air-primary" name="user_phone" value="<?php echo e($list->user_phone); ?>" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">วันเดินทาง</label>
                            <input class="form-control input-air-primary digits"  type="date" name="user_datetravel" value="<?php echo e($list->user_datetravel); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">เส้นทาง</label>
                            <input class="form-control input-air-primary" name="user_program" type="text" value="<?php echo e($list->user_program); ?>">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">จำนวน</label>
                            <input class="form-control input-air-primary" name="user_amount" type="text" value="<?php echo e($list->user_amount); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label" for="travel1">หมายเหตุ</label>
                            <textarea class="form-control input-air-primary" name="user_remark" rows="5"><?php echo e($list->user_remark); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-success" type="submit">บันทึก</button>
                    <input class="btn btn-light" type="reset" value="ยกเลิก">
                </div>
                </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>

 <!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>

    <!-- Plugins JS start-->
<script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
 <!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<!-- ckeditor -->
<script src="<?php echo e(asset('assets/js/ckeditor/ckeditor.js')); ?>"></script>
  <script>
  CKEDITOR.replace('travel_detail',{
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  } );
  </script>
  <script>
  CKEDITOR.replace('travel_remark',{    
  height : 150,
  removeButtons: 'Image,PasteFromWord,PasteText,Anchor'
  } );
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/edit_customer.blade.php ENDPATH**/ ?>