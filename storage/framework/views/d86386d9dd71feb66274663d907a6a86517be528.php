

<body>
    <?php $__env->startSection('content'); ?>
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">โปรแกรมทัวร์</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo e(route('/')); ?>">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Package Tours</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


           <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                  <?php $__currentLoopData = $travel_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                     
                
 <!-- Blog Detail Start -->
 <div class="pb-3">
    <div class="blog-item">
        <div class="position-relative">
            <img class="img-fluid w-100" src="<?php echo e(asset($data->package_cover)); ?>" alt="">
         
        </div>
    </div>
  
    <div class="bg-white mb-3" style="padding: 30px;">
      
        <h2 class="mb-3"><?php echo e($data->package_name); ?></h2>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <h5>ข้อมูลท่องเที่ยว</h5>
        <p>
            <ul>
                <?php $__currentLoopData = $print_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($item->travel_name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </p>
     
        <a href="<?php echo e(route('preview_download',['id'=> request()->id])); ?>" class="btn btn-block btn-primary">ดาวน์โหลดโปรแกรมทัวร์</a>
       
    </div>
</div>
<!-- Blog Detail End -->


                </div>
    
                <div class="col-lg-4 mt-5 mt-lg-0">
                  
    
                    <!-- Search Form -->
                    <div class="mb-5">
                        <div class="bg-white" style="padding: 30px;">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Keyword">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-primary border-primary text-white"><i
                                            class="fa fa-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category List -->
                    <div class="mb-5">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">ท่องเที่ยวในประเทศ</h4>
                        <div class="bg-white" style="padding: 30px;">
                            <ul class="list-inline m-0">
                                <li class="mb-3 d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i class="fa fa-angle-right text-primary mr-2"></i>เชียงใหม่</a>
                                </li>    
                            </ul>
                        </div>
                    </div>

                        <!-- Category List -->
                        <div class="mb-5">
                            <h4 class="text-uppercase mb-4" style="letter-spacing: 3px;">ท่องเที่ยวต่างประเทศ</h4>
                            <div class="bg-white" style="padding: 30px;">
                                <ul class="list-inline m-0">

                                    <?php $__currentLoopData = $sum_travel_os; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="mb-3 d-flex justify-content-between align-items-center">
                                        <a class="text-dark" href="#">
                                            <i class="fa fa-angle-right text-primary mr-2"></i><?php echo e($item->ct_nameTHA); ?></a>                                    
                                    </li>    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                
    
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php $__env->stopSection(); ?>

</body>

</html>


<?php echo $__env->make('index.index_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/index/travel-page.blade.php ENDPATH**/ ?>