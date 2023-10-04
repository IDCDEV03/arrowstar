
<?php $__env->startSection('title', 'สถานที่ท่องเที่ยว'); ?>

<?php $__env->startSection('css'); ?>
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
                        <?php $__currentLoopData = $data_travel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('admin.edit_travel', ['id' => request()->id])); ?>"
                                class="btn btn-sm btn-secondary">แก้ไข</a>
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0 txt-primary">ชื่อสถานที่</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static txt-primary">
                                        <?php echo e($item->travel_name); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">เมือง</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        <?php echo e($item->travel_city); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">ประเภท</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        <?php echo e($item->type_travel); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">จังหวัด</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        <?php echo e($item->name_th); ?>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label pt-0">รายละเอียดสถานที่</label>
                                <div class="col-sm-9">
                                    <div class="form-control-static">
                                        <?php echo $item->travel_detail; ?>

                                    </div>
                                </div>
                            </div>


                            <?php if($item->travel_remark == null): ?>
                            <?php else: ?>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label pt-0">Tips ข้อควรระวัง</label>
                                    <div class="col-sm-9">
                                        <div class="form-control-static">
                                            <?php echo $item->travel_remark; ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                        <hr>
                        <label class="col-sm-3 col-form-label pt-0">ภาพสถานที่</label>

                        <div class="row">
                            <div class="col-sm">
                                <?php if($count_img == '3'): ?>
                                    <label class="txt-danger">เพิ่มภาพครบจำนวนที่กำหนดแล้ว</label>
                                <?php else: ?>
                                    <button class="btn btn-info btn-sm" type="button" data-bs-toggle="modal"
                                        data-bs-target="#upload_img">เพิ่มภาพสถานที่</button>
                                <?php endif; ?>
                            </div>

                            <?php $__currentLoopData = $travel_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm">
                                    <img src="<?php echo e(asset($row->travel_img)); ?>" class="img-fluid img-thumbnail" width="300px"
                                        alt="">
                                    <a href="<?php echo e(route('admin.delete_travel_img', ['id' => $row->id])); ?>"
                                        onclick="return confirm('ต้องการลบ ใช่หรือไม่?');"
                                        class="btn btn-xs btn-danger">ลบ</a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="upload_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรูปภาพ</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('admin.insert_image_extra')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="travel_id" value="<?php echo e(request()->id); ?>">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">เลือกรูปภาพ</label>
                            <input class="form-control" name="travel_img" type="file" accept="image/*" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">ปิด</button>
                    <button class="btn btn-secondary" type="submit">บันทึก</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/travel_detail.blade.php ENDPATH**/ ?>