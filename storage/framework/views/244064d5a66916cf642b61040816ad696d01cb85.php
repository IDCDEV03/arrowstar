

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลติดต่อ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ฝากข้อมูลติดต่อ</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary" id="button" onclick="window.print()"> <i class="icofont icofont-printer"></i> พิมพ์ข้อมูล</button>
                        <p></p>
                        <?php $__currentLoopData = $contact_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="table-responsive">
                                <table id="printTable" class="table table-bordered table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>ชื่อ-นามสกุล</td>
                                            <td class="w-50">
                                                <?php echo e($item->member_name); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>เบอร์โทรศัพท์</td>
                                            <td class="w-50">
                                                <?php echo e($item->member_phone); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>หัวข้อติดต่อ</td>
                                            <td class="w-50">
                                                <?php echo e($item->contact_subject); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>รายละเอียด</td>
                                            <td class="w-50">
                                                <?php echo e($item->SubjectDetail); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LINE ID</td>
                                            <td class="w-50">
                                                <?php echo e($item->member_line); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ช่วงเวลา </td>
                                            <td class="w-50">
                                                <?php if($item->from_date != null): ?>
                                                    <?php echo e(Carbon\Carbon::parse($item->from_date)->format('d/m/Y')); ?> -
                                                    <?php echo e(Carbon\Carbon::parse($item->finish_date)->format('d/m/Y')); ?>

                                                <?php else: ?>
                                                    <span class="text-danger">ไม่ได้ระบุข้อมูล</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>กำหนดการ</td>
                                            <td class="w-50">
                                                <?php if($item->file_input != null): ?>
                                                    <a href="<?php echo e(asset($item->file_input)); ?>"><i
                                                            class="icofont icofont-download-alt"></i> ดาวน์โหลด </a>
                                                <?php else: ?>
                                                    <span class="text-danger">ไม่ได้อัพโหลดเอกสาร</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ต้องการใบเสนอราคา</td>
                                            <td class="w-50">
                                                <?php echo e($item->req_quotations); ?>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td>วันที่ติดต่อ</td>
                                            <td class="w-50">
                                                <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')); ?>

                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function printData() {

            var divToPrint = document.getElementById("printTable");
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding;0.5em;' +
                '}' +
                '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write('<title>Print Contact</title>');
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
        }

        document.querySelector("#button").addEventListener("click", function() {
            printData();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\arrowstar\resources\views/admin/contact_data.blade.php ENDPATH**/ ?>