
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
         
            <h5 class="card-header">จังหวัด <?php echo e($province_name); ?></h5>
        
            <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
                 <?php endif; ?>

                <div class="dt-ext table-responsive">
                    <table class="display" id="dataTables01">
                        <thead>
                            <tr>
                                <th>สถานที่</th> 
                                <th>ประเภท</th>
                                <th>อัพเดทล่าสุด</th>
                                <th></th>                    
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $list_travel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($item->travel_name); ?>                          
                                </td>
                                <td> <?php echo e($item->type_travel); ?> </td>
                                <td><?php echo e(Carbon\Carbon::parse($item->travel_created_at)->format('d/m/Y H:i')); ?></td>
                                
                                <td>
                                    <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                                        <a href="<?php echo e(route('admin.data_travel', ['id' => $item->travel_id])); ?>" class="btn btn btn-outline-light txt-dark " type="button"> <i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn btn-outline-light txt-dark " type="button"><i class="fa fa-trash-o"></i></a>
                                
                                    </div>
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

<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IDDRIVES\Documents\GitHub\arrowstar\resources\views/admin/list_travel.blade.php ENDPATH**/ ?>