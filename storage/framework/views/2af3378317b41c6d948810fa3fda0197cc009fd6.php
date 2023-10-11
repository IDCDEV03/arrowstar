

<body>
    <?php $__env->startSection('content'); ?>
        <!-- Header Start -->
        <div class="container-fluid page-header">
            <div class="container">
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                    <h3 class="display-4 text-white text-uppercase">ฝากข้อมูลติดต่อ</h3>
                    <div class="d-inline-flex text-white">
                        <p class="m-0 text-uppercase"><a class="text-white" href="<?php echo e(route('/')); ?>">Home</a></p>
                        <i class="fa fa-angle-double-right pt-1 px-3"></i>
                        <p class="m-0 text-uppercase">Contact</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <?php if(session('success')): ?>
            <script>
                Swal.fire(
                    'สำเร็จ!',
                    "<?php echo e(session('success')); ?>",
                    'success',
                );
            </script>
        <?php endif; ?>
            <!-- Contact Start -->
            <div class="container-fluid py-5">
                <div class="container py-5">
                    <div class="text-center mb-3 pb-3">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact</h6>
                        <h1>ฝากข้อมูลติดต่อ</h1>
                    </div>

                    <!--startform-->
                    <div class="card">
                        <div class="card-body">
                            <form id="form-contact" action="<?php echo e(route('save_contact')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputEmail4" name="member_name"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="inputPassword4" name="member_phone"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubject">โปรดเลือกหัวข้อที่ต้องการติดต่อ <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" id="inputSubject" name="contact_subject" required>
                                        <option value="0" selected disabled>เลือก..</option>
                                        <option value="จัดกรุ๊ปทัวร์">จัดกรุ๊ปทัวร์</option>
                                        <option value="สัมมนา/ศึกษาดูงาน">สัมมนา/ศึกษาดูงาน</option>
                                        <option value="เช่ารถตู้/รถบัส">เช่ารถตู้/รถบัส</option>
                                        <option value="ของฝาก/ของที่ระลึก">ของฝาก/ของที่ระลึก</option>
                                        <option value="อื่นๆ">อื่นๆ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubjectDetail">รายละเอียดที่ต้องการสอบถาม <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="inputSubjectDetail" name="SubjectDetail" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Line ID (ถ้ามี)</label>
                                    <input type="text" class="form-control" id="inputAddress2" name="member_line">
                                </div>
                                <div class="form-row">
                                    **
                                </div>

                                <button class="g-recaptcha btn btn-primary" 
        data-sitekey="6Lc7WZEoAAAAAKY8yMbNw-nd2UOx4uqR1cYV5j1b" 
        data-callback='onSubmit' 
        data-action='submit'>ยืนยัน</button>
                            </form>

                        </div>
                    </div>
                    <!--endform-->

                </div>
            </div>
            <!-- Contact End -->
        <?php $__env->stopSection(); ?>

</body>

</html>
<?php $__env->startSection('script'); ?>
<script>
    function onSubmit(token) {
      document.getElementById("form-contact").submit();
    }
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index.index_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/index/contact.blade.php ENDPATH**/ ?>