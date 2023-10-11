

<body>
    <?php $__env->startSection('content'); ?>
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">บริการเช่ารถ</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo e(route('/')); ?>">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">BUS/VAN</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Gall Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
               
                <div class="text-center mb-3 pb-3">
                    <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">รถบัส VIP 42 ที่นั่ง / รถตู้ VIP</h4>
                 <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary mb-3">ติดต่อสอบถาม</a>
                </div>

                <div class="container">
                    <div class="row mb-3">
                        <?php $__currentLoopData = $gall_list1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-sm">
                        <img src="<?php echo e(asset($item->gall_path)); ?>" class="img-fluid" alt="">
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="row mb-3">
                        <?php $__currentLoopData = $gall_list2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-sm">
                        <img src="<?php echo e(asset($item->gall_path)); ?>" class="img-fluid" alt="">
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row mb-3">
                        <?php $__currentLoopData = $gall_list3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-sm">
                        <img src="<?php echo e(asset($item->gall_path)); ?>" class="img-fluid" alt="">
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

              </div>

            </div>
        </div>
        <!-- Gall End -->
    <?php $__env->stopSection(); ?>

</body>

</html>


<?php echo $__env->make('index.index_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/index/van.blade.php ENDPATH**/ ?>