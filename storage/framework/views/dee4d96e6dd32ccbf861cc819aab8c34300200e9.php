
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
                    
                        <?php $__currentLoopData = $new_tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $id = $row->package_id;
                        ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="province_id" 
                                                value="<?php echo e($row->id); ?>">
                                           
                                                <div class="form-control-static">
                                                    <?php echo e($row->name_th); ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label pt-0">ชื่อแพ็คเกจ</label>
                                            <div class="col-sm-9">
                                                <div class="form-control-static">
                                                    <?php echo e($row->package_name); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label"
                                                    for="colFormLabelSm26">ระบุสถานที่ท่องเที่ยว</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="form theme-form" action="<?php echo e(route('admin.save_tourist')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($row->package_id); ?>" name="pk_id">
                                <table class="table" id="table" name="table">
                                    <tbody>
                                        <tr>
                                            <td width='10%'><input type="hidden" 
                                                name="add[0][package_id]" class="form-control" 
                                                value="<?php echo e($row->package_id); ?>" readonly></td>
                                            <td><input type="text" 
                                                name="add[0][program_place]" class="form-control"></td>
                                            <td>
                                                <button type="button" name="add_btn" id="add_btn"
                                                    class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-success">บันทึก</button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script type="text/javascript">
        var i = 0;
        $('#add_btn').click(function() {
            ++i;
            $('#table').append(
                '<tr><td width="10%"><input type="hidden" name="add['+i+'][package_id]" class="form-control" value="<?php echo $id ?>" readonly></td><td><input type="text" name="add['+i+'][program_place]" class="form-control" /></td><td><button type="button" name="remove" id="remove" class="btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td></tr>');
        });

        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\IDDRIVES\Documents\GitHub\arrowstar\resources\views/admin/new_package_add.blade.php ENDPATH**/ ?>