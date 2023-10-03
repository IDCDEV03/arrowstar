
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sb-1.6.0/datatables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Pages</li>
<li class="breadcrumb-item active">ประเทศ</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header">
               <h5>รายการสถานที่</h5>   
               <hr> 
               <a class="btn btn-primary" href="<?php echo e(route('admin.all_program_oversea')); ?>">โปรแกรมทัวร์ต่างประเทศ</a>               
               <a class="btn btn-secondary" href="<?php echo e(route('admin.all_program')); ?>">โปรแกรมทัวร์ในประเทศ</a>
            <div class="card-body">
                <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <b><?php echo e(session('success')); ?></b>
                </div>
                 <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="example-oversea">
                        <thead>
                            <tr>
                                <th>ชื่อสถานที่</th>
                                <th>ประเทศ</th>
                                <th>เมือง</th> 
                                <th>ประเภท</th>                              
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $list_oversea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <tr>
                                <td> <?php echo e($row->travel_name); ?> </td>
                                <td> <?php echo e($row->ct_nameTHA); ?> </td>
                                <td> <?php echo e($row->city_name); ?> </td>
                                <td> <?php echo e($row->type_travel); ?> </td>
                                <td> <a href="<?php echo e(route('admin.data_oversea',['id'=>$row->travel_id])); ?>" class="btn btn-sm btn-info">View</a> </td>                               
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
<script src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sb-1.6.0/datatables.min.js"></script>

<script>

        $('#example-oversea').DataTable({
            dom:'lBfrtip',
            buttons: [
                'excelHtml5','print'
            ],
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
                },
                
        });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/list_oversea.blade.php ENDPATH**/ ?>