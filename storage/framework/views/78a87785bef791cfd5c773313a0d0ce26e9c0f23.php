

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>เพิ่มสถานที่ (ต่างประเทศ)</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">

        <?php $__errorArgs = ['travel_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="alert alert-danger">
          <?php echo e($message); ?>

        </div>     
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

         <div class="card">    
          <form class="form theme-form" action="<?php echo e(route('admin.insert_travel_oversea')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>           
            <div class="card-body">
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="name_country">ประเทศ</label>
                        <select class="js-example-basic-single input-air-primary" name="name_country" id="name_country">
                          <option selected disabled>เลือกประเทศ..</option>
                          <?php $__currentLoopData = $country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <option value="<?php echo e($row->rec); ?>"> <?php echo e($row->ct_nameTHA); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>                      
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="city_name">เมือง</label>
                        <input class="form-control input-air-primary" name="city_name" id="city_name" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="type_travel">ประเภท</label>
                        <select class="form-select input-air-primary" name="type_travel" id="type_travel">
                          <option selected disabled>เลือกประเภท..</option>
                          <?php $__currentLoopData = $type_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                          <option value="<?php echo e($item->number_type); ?>"> <?php echo e($item->type_travel); ?> </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                      </div>
                    </div>
                  </div>
            
                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_name">ชื่อสถานที่</label>
                        <input class="form-control input-air-primary" name="travel_name" id="travel1" type="text">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel3">เลือกรูปภาพ</label>
                         <span class="txt-info">(อัพโหลดได้สูงสุด 3 ภาพ)</span>
                        <input class="form-control" type="file" name="travel_img[]" multiple accept="image/*">                        
                      
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel4">รายละเอียดสถานที่</label>
                        <textarea name="travel_detail" id="travel_detail" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" for="travel_remark">Tips ข้อควรระวัง</label>
                        <textarea name="travel_remark" id="travel_remark" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">บันทึก</button>
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
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/new_travel_oversea.blade.php ENDPATH**/ ?>