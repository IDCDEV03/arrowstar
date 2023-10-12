

<body>
    <?php $__env->startSection('content'); ?>
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">แพ็คเกจ-บริการ</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo e(route('/')); ?>">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Service</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Destination Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Service</h6>
                    <h1>แพ็คเกจ-บริการ</h1>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv01.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white">จัดกรุ๊ปเหมา</h5>                               
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv02.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white">ทัวร์ในประเทศ</h5>                               
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv03.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none" >
                                <h5 class="text-white">ทัวร์ต่างประเทศ</h5>                             
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv04.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white">บริการเช่ารถ</h5>                              
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv05.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white">จัดสัมมนา/ศึกษาดูงาน</h5>                          
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="<?php echo e(asset('index_gall/sv06.jpg')); ?>" alt="">
                            <span class="destination-overlay text-white text-decoration-none">
                                <h5 class="text-white">ของฝาก/ของที่ระลึก</h5>                              
                            </span>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('contact')); ?>" class="btn btn-success btn-block ">ติดต่อสอบถามเพิ่มเติม</a>
            </div>
        </div>
        <!-- Destination Start -->
    <?php $__env->stopSection(); ?>

</body>

</html>

<?php echo $__env->make('index.index_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/index/service.blade.php ENDPATH**/ ?>