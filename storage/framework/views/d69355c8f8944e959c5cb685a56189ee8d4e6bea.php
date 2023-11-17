
<?php $__env->startSection('title', 'รายการโปรแกรมทัวร์'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>โปรแกรมทัวร์</h3>
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

                    <?php $__currentLoopData = $package_pre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">จังหวัด</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <?php echo e($row->name_th); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ชื่อแพ็คเกจ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <?php echo $row->package_name; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">ความต้องการพิเศษ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <?php echo $row->program_spacial_req; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-danger">หมายเหตุ</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static txt-danger">
                                                <?php echo $row->program_remark; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tips ข้อควรระวัง</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <?php echo $row->program_tips; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-info">ราคารวม</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                                <span class="txt-info"><?php echo $row->price_total; ?></span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label txt-danger">ราคาไม่รวม</label>
                                        <div class="col-sm-9">
                                            <div class="form-control-static">
                                               <span class="txt-danger"><?php echo $row->price_notin; ?></span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-footer">
                        <a class="btn btn-secondary" href="<?php echo e(route('admin.create_tips', ['id' => request()->id])); ?>">เพิ่มความต้องการพิเศษ / Tips / หมายเหตุ</a>
                         <a href="<?php echo e(route('admin.print_preview',['id' => request()->id])); ?>" class="btn btn-success" target="_blank">พิมพ์เอกสารโปรแกรม</a>
                    </div>
                    
                </div>
            </div>
            <?php
                $i = 1;
            ?>
            <div class="card">
              
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><strong>สถานที่</strong></th>
                                    <th>ประเภท</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $package_place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row">
                                            <?php
                                                echo $i++;
                                            ?></th>
                                        <td><?php echo e($data->travel_name); ?></td>
                                        <td> <?php echo e($data->type_travel); ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/preview_package.blade.php ENDPATH**/ ?>