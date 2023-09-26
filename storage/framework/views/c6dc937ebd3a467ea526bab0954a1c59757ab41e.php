
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
                   <div class="card-header">
                    ชื่อแพ็คเกจ : <?php echo e($package_name); ?>

                  </div>          
                  <?php
                      $i = '1';
                  ?>             
                            <div class="card-body">
                              <form class="f1" action="<?php echo e(route('admin.insert_program_travel')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                       <input type="hidden" name="package_id" value="<?php echo e(request()->id); ?>">
                              <div class="f1-steps">
                                <div class="f1-progress">
                                  <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                                </div>
                                <div class="f1-step active">
                                  <div class="f1-step-icon">
                                    <i class="fa fa-image"></i>
                                  </div>
                                  <p>เลือกสถานที่ท่องเที่ยว</p>
                                </div>
                                <div class="f1-step">
                                  <div class="f1-step-icon">
                                    <i class="fa fa-coffee"></i>
                                  </div>
                                  <p>เลือกร้านอาหาร</p>
                                </div>                              
                              </div>

                              <fieldset>
                              <h5 class="card-title">เลือกสถานที่ท่องเที่ยว</h5>

                              <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" for="package_day">วันที่</label>
                                    <select class="form-select form-control-sm digits" name="package_day" id="package_day">
                                      <option disabled selected>-เลือก</option>
                                      <option value="1"> 1 </option>
                                      <option value="2"> 2 </option>
                                      <option value="3"> 3 </option>
                                      <option value="4"> 4 </option>
                                      <option value="5"> 5 </option>
                                      <option value="6"> 6 </option>
                                      <option value="7"> 7 </option>                                    </select>
                                  </div>
                                </div>
                              </div>

                              <hr>
                                <table class="table table-hover display" id="basic-1">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">ชื่อสถานที่</th>
                                          <th>เลือก</th>
                                          <th scope="col">รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $__currentLoopData = $new_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                          <th scope="row">
                                            <input type="hidden" name="province_id" value="<?php echo e($item->province_id); ?>">
                                            <?php
                                             echo $i++;   
                                            ?>
                                          </th>                                         
                                          <td><?php echo e($item->travel_name); ?></td>
                                          <td>
                                            <div class="form-check checkbox checkbox-primary mb-0">
                                              <input class="form-check-input" id="checkbox-primary-<?php echo e($item->travel_id); ?>" type="checkbox" name="travel_id[]" value="<?php echo e($item->travel_id); ?>">
                                              <label class="form-check-label" for="checkbox-primary-<?php echo e($item->travel_id); ?>">เลือก</label>
                                            </div>
                                          </td>
                                          <td><a href="<?php echo e(route('admin.data_travel', ['id' => $item->travel_id])); ?>" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-info-circle"></i></a></td>
                                          
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tbody>
                                  </table>     

                                 
<hr>
<div class="f1-buttons">
  <button class="btn btn-primary btn-next" type="button">ต่อไป</button>
</div>

                              </fieldset>


                              <fieldset>                               
                                <h5 class="card-title">เลือกร้านอาหาร</h5>
                                <table class="table table-hover display" id="food-list">
                                    <thead>
                                        <tr>                                         
                                          <th>เลือก</th>
                                          <th scope="col">ชื่อสถานที่</th>
                                          <th scope="col">รายละเอียด</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php $__currentLoopData = $food_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>                                      
                                          <td><?php echo e($row->travel_name); ?></td>
                                          <td>
                                            <div class="form-check checkbox checkbox-info mb-0">
                                              <input class="form-check-input" id="checkbox-info-<?php echo e($row->travel_id); ?>" type="checkbox" name="travel_id[]" value="<?php echo e($row->travel_id); ?>">
                                              <label class="form-check-label" for="checkbox-info-<?php echo e($row->travel_id); ?>">เลือก</label>
                                            </div>
                                          </td>
                                          <td><a href="<?php echo e(route('admin.data_travel', ['id' => $row->travel_id])); ?>" class="btn btn-sm btn-secondary" target="_blank"><i class="fa fa-info-circle"></i></a></td>
                                          
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tbody>

                                  </table>  
                                  <hr>

                                <div class="f1-buttons">
                                  <button class="btn btn-primary btn-previous" type="button">ย้อนกลับ</button>
                                  <a class="btn btn-success">บันทึก</a>
                                  <button class="btn btn-secondary btn-submit" type="submit">เสร็จสิ้น</button>
                                </div>

                              </fieldset>

                              

                              </form>
</div>
            </div>
        </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/form-wizard/form-wizard-three.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/form-wizard/jquery.backstretch.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/new_package_add.blade.php ENDPATH**/ ?>