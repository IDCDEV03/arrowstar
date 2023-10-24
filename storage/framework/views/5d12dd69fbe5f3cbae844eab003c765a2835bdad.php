
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">จังหวัด</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>รายการโปรแกรมทัวร์</h5>   
               <hr> 
               <a class="btn btn-primary" href="<?php echo e(route('admin.all_program_oversea')); ?>">โปรแกรมทัวร์ต่างประเทศ</a>               
               <a class="btn btn-secondary" href="<?php echo e(route('admin.all_program')); ?>">โปรแกรมทัวร์ในประเทศ</a>
            <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <b><?php echo e(session('success')); ?></b>
                </div>
                 <?php endif; ?>
                <div class="dt-ext table-responsive">
                    <table class="display" id="table-province">
                        <thead>
                            <tr>
                                <th>ชื่อจังหวัด</th>
                                <th>ภาค</th>
                                <th>สถานะ</th>
                                <th>ตั้งค่า</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $province_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(route('admin.list_travel',['id' => $item->id])); ?>"><?php echo e($item->name_th); ?></a></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><span class="badge badge-success">Active</span></td>                                
                                <td>
                                    <a href="<?php echo e(route('admin.new_package', ['id' => $item->id])); ?>" class="btn btn-secondary btn-xs">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a href="<?php echo e(route('admin.list_program', ['id' => $item->id])); ?>" class="btn btn-primary btn-xs">
                                        <i class="fa fa-navicon"></i>
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
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<script>
    $(function(){
        $("#table-province").dataTable(
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Documents\GitHub\arrowstar\resources\views/admin/list_province.blade.php ENDPATH**/ ?>