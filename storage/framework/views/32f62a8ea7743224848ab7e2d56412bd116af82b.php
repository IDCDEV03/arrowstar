<?php echo $__env->make('index.layout_frontend.index_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('index.layout_frontend.index_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

<!-- Footer Start -->
<?php echo $__env->make('index.layout_frontend.index_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php echo $__env->yieldContent('script'); ?>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('plugin_index/lib/easing/easing.min.js')); ?> "></script>
<script src="<?php echo e(asset('plugin_index/lib/owlcarousel/owl.carousel.min.js')); ?> "></script>
<script src="<?php echo e(asset('plugin_index/lib/tempusdominus/js/moment.min.js')); ?> "></script>
<script src="<?php echo e(asset('plugin_index/lib/tempusdominus/js/moment-timezone.min.js')); ?> "></script>
<script src="<?php echo e(asset('plugin_index/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')); ?> "></script>

<!-- Contact Javascript File -->
<script src="<?php echo e(asset('plugin_index/mail/jqBootstrapValidation.min.js')); ?> "></script>
<script src="<?php echo e(asset('plugin_index/mail/contact.js')); ?> "></script>

<!-- Template Javascript -->
<script src="<?php echo e(asset('plugin_index/js/main.js')); ?> "></script>


<?php /**PATH D:\GitHub\arrowstar\resources\views/index/index_app.blade.php ENDPATH**/ ?>