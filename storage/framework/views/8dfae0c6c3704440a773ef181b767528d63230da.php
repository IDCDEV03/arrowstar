
<?php $__env->startSection('title', 'Login เข้าสู่ระบบ'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-7"><img class="bg-img-cover bg-center" src="<?php echo e(asset('assets/images/login/travel_bg.png')); ?>" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href="#"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo1.png')); ?>" width="120px" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo1.png')); ?>" width="120px" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form" action="<?php echo e(route('login.perform')); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <h4>เข้าสู่ระบบ</h4>
                     <p>สำหรับผู้ดูแลระบบ</p>
                     <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <input class="form-control" type="text" name="username" required="">
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required="" >
                        <div class="show-hide"><span class="show"></span></div>
                        <?php if($errors->has('password')): ?>
                        <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                    <?php endif; ?>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Log In</button>
                     </div>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/auth/login.blade.php ENDPATH**/ ?>