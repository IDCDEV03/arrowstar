

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
<h3>ฝากข้อมูลติดต่อ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="card">                 
            <div class="card-body">
                <?php if(session('delete')): ?>
                <div class="alert alert-danger" role="alert">
                    <b><?php echo e(session('delete')); ?></b>
                </div>
                 <?php endif; ?>
            
                 <div class="dt-ext table-responsive">
                    <table class="display table" id="customer_table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ชื่อ-นามสกุล</th>                   
                          <th>เบอร์โทรศัพท์</th>
                          <th>หัวข้อ</th>
                          <th>รายละเอียด</th>
                          <th>Line ID</th>
                          <th>วันที่ติดต่อ</th>
                          <th>ตั้งค่า</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = $list_contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <tr>
                          <td><?php echo e($item->id); ?></td>
                          <td><?php echo e($item->member_name); ?></td>
                          <td> <?php echo e($item->member_phone); ?> </td>
                          <td><?php echo e($item->contact_subject); ?></td>
                          <td><?php echo e($item->SubjectDetail); ?></td>
                          <td><?php echo e($item->member_line); ?></td>                          
                          <td> <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?></td>
                          <td> <a href="<?php echo e(route('admin.delete_contact', ['id' => $item->id])); ?>" class="btn btn-sm btn-danger" onclick="return confirm('ต้องการลบ ใช่หรือไม่?');">ลบ</a> </td>
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
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<script>
    $(function(){
        $("#customer_table").dataTable(
            {
            dom: 'Bfrtip',
            buttons: [
                'pageLength','excel','print'
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
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\admin\Documents\GitHub\arrowstar\resources\views/admin/list_contact.blade.php ENDPATH**/ ?>