

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>เพิ่มสถานที่</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">

         <div class="card">    
          <form class="form theme-form" action="<?php echo e(route('admin.update_travel')); ?>" method="POST" >
              <?php echo csrf_field(); ?>
           <?php $__currentLoopData = $data_travel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            <input type="hidden" name="travel_id" value="<?php echo e(request()->id); ?>">
            <div class="card-body">   
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="province1">จังหวัด</label>
                        <select class="form-select input-air-primary" name="province1" id="province1">
                            <option value="0" selected>-<?php echo e($list->name_th); ?></option>  
                            <?php $__currentLoopData = $province_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <option value="<?php echo e($row->id); ?>"> <?php echo e($row->name_th); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                      
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="type_travel">ประเภท ::  <?php echo e($list->type_travel); ?></label>
                      </div>
                    </div>
                  </div>
            
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel1">ชื่อสถานที่</label>
                        <input class="form-control input-air-primary" name="travel_name" id="travel1" type="text" value="<?php echo e($list->travel_name); ?>">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel4">รายละเอียดสถานที่</label>
                        <textarea name="travel_detail" class="form-control" rows="5"><?php echo e($list->travel_detail); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_remark">Tips ข้อควรระวัง</label>
                        <textarea name="travel_remark" class="form-control" rows="5"><?php echo e($list->travel_remark); ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">บันทึก</button>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
 $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
  </script>
  <script>
    $('#summernote2').summernote({
           tabsize: 2,
           height: 120,
           toolbar: [
             ['style', ['style']],
             ['font', ['bold', 'underline', 'clear']],
             ['color', ['color']],
             ['para', ['ul', 'ol', 'paragraph']],
             ['table', ['table']],
           ]
         });
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/edit_travel.blade.php ENDPATH**/ ?>