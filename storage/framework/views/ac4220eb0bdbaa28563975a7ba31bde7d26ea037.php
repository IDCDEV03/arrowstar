
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
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

                 <h5 class="card-title">
                    จังหวัด : <?php echo e($province_name); ?>

                 </h5>
<hr>
                <div class="dt-ext table-responsive">
                    <table class="display" id="dataTables01">
                        <thead>
                            <tr>
                                <th>โปรแกรมทัวร์</th>
                                <th>จังหวัด</th>  
                                <th></th>
                                <th></th>                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $list_program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(route('admin.preview_package', ['id' => $item->package_id])); ?>">
                                    <?php echo e($item->package_name); ?>

                                </a>
                                </td>
                                <td> <?php echo e($item->name_th); ?> </td>
                                <td>
                                    <a class="btn btn-success btn-xs" >
                                    <i data-feather="download"></i>
                                </a>
                                </td> 
                                <td>
                                    <a class="btn btn-danger btn-xs" 
                                    href="<?php echo e(route('admin.delete_program',['id'=>$item->package_id])); ?>" >
                                        <i data-feather="trash-2"></i>
                                    </a>
                                </td>                          
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>


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

<script src="<?php echo e(asset('assets/js/scrollbar/simplebar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scrollbar/custom.js')); ?>"></script>
 <!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>

    <!-- Plugins JS start-->
<script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/tooltip-init.js')); ?>"></script>
 <!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script>
    $(function(){
        $("#dataTables01").dataTable(
            {
                "pageLength": 25,
                "language": {
                    "info":"แสดงผล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "search":"ค้นหา:",
                    "lengthMenu":"แสดงผล _MENU_ รายการ",
                    "zeroRecords":"ไม่พบข้อมูล",
                    "paginate": {
                        "next":"ต่อไป",
                        "previous":"ก่อนหน้า"
                    }
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/list_program.blade.php ENDPATH**/ ?>